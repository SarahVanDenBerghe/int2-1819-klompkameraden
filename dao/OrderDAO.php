<?php

require_once( __DIR__ . '/DAO.php');

class OrderDAO extends DAO {

public function selectOrderById($id){
    $sql = "SELECT * FROM `int2_orders` WHERE `id` =:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectOrderEventsById($id){
    $sql = "SELECT * FROM `int2_orders_events` WHERE `id` =:id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // USER ORDER
  public function insertUser($data) {
    $errorsOrder = $this->validateOrder($data);
      if(empty($errorsOrder)){
      $sql = "INSERT INTO `int2_orders` (`firstname`,`lastname`,`email`, `street`, `number`, `city`, `postalcode`) 
        VALUES(:firstname,:lastname,:email,:street,:number,:city,:postalcode)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname',$data['firstname']);
      $stmt->bindValue(':lastname',$data['lastname']);
      $stmt->bindValue(':email',$data['email']);
      $stmt->bindValue(':street',$data['street']);
      $stmt->bindValue(':number',$data['number']);
      $stmt->bindValue(':city',$data['city']);
      $stmt->bindValue(':postalcode',$data['postalcode']);
     if($stmt->execute()){
        return $this->selectOrderById($this->pdo->lastInsertId());
      }
    } 
    return false;
  }
  
  // ITEMS ORDER
  public function insertOrder($data) {
          $sql = "INSERT INTO `int2_orders_events` (`order_id`,`event_id`,`quantity`) 
        VALUES(:order_id,:event_id,:quantity)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':order_id',$data['order_id']); 
        $stmt->bindValue(':event_id',$data['event_id']);
        $stmt->bindValue(':quantity',$data['quantity']);
             if($stmt->execute()){
        return $this->selectOrderEventsById($this->pdo->lastInsertId());
      }

    return false;
  }

  // VALIDATE ORDER
  public function validateOrder($data){
    $errorsOrder = [];
    if (empty($data['firstname'])) {
      $errorsOrder['firstname'] = 'Vul je voornaam in';
    }
    if (empty($data['lastname'])) {
      $errorsOrder['lastname'] = 'Vul je familienaam in';
    }
    if (empty($data['email'])) {
      $errorsOrder['email'] = 'Vul je e-mailadres in';
    }
    if (empty($data['street'])) {
      $errorsOrder['street'] = 'Vul je straatnaam in';
    }
    if (empty($data['number'])) {
      $errorsOrder['number'] = 'Vul je huisnr. in';
    }
    if (empty($data['city'])) {
      $errorsOrder['city'] = 'Vul je stadsnaam in';
    }
     if (empty($data['postalcode'])) {
      $errorsOrder['postalcode'] = 'Vul je postcode in';
    }
    return $errorsOrder;
  }
}
