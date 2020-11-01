<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/EventDAO.php';
require_once __DIR__ . '/../dao/TypeDAO.php';
require_once __DIR__ . '/../dao/ContactDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';

class OrdersController extends Controller {

  private $eventDAO;
  private $typeDAO;
  private $contactDAO;
  private $orderDAO;

  function __construct() {
    $this->eventDAO = new EventDAO();
    $this->typeDAO = new TypeDAO();
    $this->contactDAO = new ContactDAO();
    $this->orderDAO = new OrderDAO();
  }

  public function cart() {
    // OVERZICHT WINKELMAND
    if (!empty($_POST['action'])) {
      if ($_POST['action'] == 'add') {
        $this->_handleAdd();
        $_SESSION['add'] = 'Toegevoegd aan winkelmandje!';
        header('Location: index.php?page=detail&id=' . $_POST['event_id']);
        exit();
      }
      if ($_POST['action'] == 'empty') {
        $_SESSION['cart'] = array();
      }
      if ($_POST['action'] == 'update') {
        $this->_handleUpdate();
      }
      header('Location: index.php?page=cart#cart__breadcrumb--active');
      exit();
    }
    
    if (!empty($_POST['remove'])) {
      $this->_handleRemove();
      header('Location: index.php?page=cart');
      exit();
    }

    $this->set('title','Winkelmand');
    $this->set('currentPage','cart');
  }

  // CHECKOUT FORM
  public function checkout() {
    if(!empty($_POST['action'])){
      if($_POST['action'] == 'checkoutOrder'){
        $order = $this->orderDAO->insertUser($_POST); 

        if($gegevensId = $order){
            $this->_handleCheckout($gegevensId); 
          }

        if (!$order){
          $errorsOrder;
          $errorsOrder = $this->orderDAO->validateOrder($_POST);
          $this->set('errorsOrder',$errorsOrder);
        }
        $this->_handleCheckoutOrder();
      }
      header('location: index.php?page=confirmation');
      exit();
    }

    $this->set('title','checkout');
    $this->set('currentPage','checkout');
  }

    private function _handleCheckoutOrder(){
    $data = $_POST;

    exit();
  }

  public function confirmation() {
    $this->set('title','confirmation');
    $this->set('currentPage','confirmation');
  } 


  // CART ADD/REMOVE/UPDATE
  private function _handleCheckout($gegevensId) {
    $data = array();
    if(!empty($_SESSION['cart'])){
      foreach ($_SESSION['cart'] as $eventId => $quantity) {
        array_push($data, array(
          'order_id' => $gegevensId['id'],
          'event_id' => $eventId,
          'quantity' => $quantity['quantity']
        ));
      }
      
      foreach($data as $order){
        $this->orderDAO->insertOrder($order);
      }
        header('Location: index.php?page=confirmation');
        unset($_SESSION['cart']);
        exit();
        }
  }

  private function _handleAdd() {
    if (empty($_SESSION['cart'][$_POST['event_id']])) {
      $ticket = $this->eventDAO->selectById($_POST['event_id']);
      if (empty($ticket)) {
        return;
      }
      $_SESSION['cart'][$_POST['event_id']] = array(
        'ticket' => $ticket,
        'quantity' => $_POST['quantity']
      );
    }
    $_SESSION['cart'][$_POST['event_id']]['quantity'];
  }

  private function _handleRemove() {
    if (isset($_SESSION['cart'][$_POST['remove']])) {
      unset($_SESSION['cart'][$_POST['remove']]);
    }
  }

  private function _handleUpdate() {
    foreach ($_POST['quantity'] as $eventId => $quantity) {
      if (!empty($_SESSION['cart'][$eventId])) {
        $_SESSION['cart'][$eventId]['quantity'] = $quantity;
      }
    }
    $this->_removeWhereQuantityIsZero();
  }

  private function _removeWhereQuantityIsZero() {
    foreach($_SESSION['cart'] as $eventId => $info) {
      if ($info['quantity'] <= 0) {
        unset($_SESSION['cart'][$eventId]);
      }
    }
  }

}
