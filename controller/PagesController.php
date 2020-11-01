<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/EventDAO.php';
require_once __DIR__ . '/../dao/TypeDAO.php';
require_once __DIR__ . '/../dao/ContactDAO.php';
require_once __DIR__ . '/../dao/OrderDAO.php';

class PagesController extends Controller {

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

  public function index() {

    // EVENTS OPHALEN
    $types = false;
    $price = false;

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($events);
      exit();
    }

    if(!empty($_POST['action'])){
      if($_POST['action'] == 'sendMessage'){
        $message = $this->contactDAO->sendMessage($_POST);
        if(empty($message)){
          $errorsContact = $this->contactDAO->validateContact($_POST);
          $this->set('errorsContact',$errorsContact);
        }else{
          $_SESSION['info'] = 'Je bericht werd verstuurd!';
          header('Location: index.php?page=' . $_POST['page'] . '#footer');
          exit();
        }
      }
    }

    $this->set('title','Home');
    $this->set('currentPage','index');
  }

  public function detail() {
    if(!empty($_GET['id'])){
      $event = $this->eventDAO->selectById($_GET['id']);
    }

    if(empty($event)){
      header('Location:index.php?page=events'); ;
      exit();
    } 
    $this->set('event',$event);
    $this->set('title','Detail');
    $this->set('currentPage','events');
  }
  
  public function events() {
    $types = false;
    if (!empty($_GET['types'])) {
      $types = $_GET['types'];
    }
    $price = false;
    if (!empty($_GET['price'])) {
      $price = $_GET['price'];
    }
    
    $events = $this->eventDAO->selectAllEvents($types, $price);

    if(empty($events)){
      $_SESSION['error'] = 'Er werden geen events gevonden, filter opnieuw.';
    }

    if ($_SERVER['HTTP_ACCEPT'] == 'application/json') {
      echo json_encode($events);
      exit();
    }

    $this->set('events', $events);
    $this->set('types',$this->typeDAO->selectTypes());
    $this->set('title','Events');
    $this->set('currentPage','events');
  }

  public function story() {
    $this->set('title','Verhaal');
    $this->set('currentPage','story');
  }
}