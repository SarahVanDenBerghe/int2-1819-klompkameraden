<?php

require_once( __DIR__ . '/DAO.php');

class ContactDAO extends DAO {

  public function selectMessageById($id){
    $sql = "SELECT * FROM `int2_contact` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  public function sendMessage($data){
    $errorsContact = $this->validateContact($data);
    if(empty($errors)){
      $sql = "INSERT INTO `int2_contact` (`firstname`,`lastname`,`subject`,`email`,`message`) 
              VALUES(:firstname,:lastname,:subject,:email,:message)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':firstname',$data['firstname']);
      $stmt->bindValue(':lastname',$data['lastname']);
      $stmt->bindValue(':subject',$data['subject']);
      $stmt->bindValue(':email',$data['email']);
      $stmt->bindValue(':message',$data['message']);
      if($stmt->execute()){
        return $this->selectMessageById($this->pdo->lastInsertId()); 
      }
    }
    return false;
  }

    public function validateContact($data){
    $errorsContact = [];
    if (empty($data['firstname'])) {
      $errorsContact['firstname'] = 'Vul je voornaam in';
    }
    if (empty($data['lastname'])) {
      $errorsContact['lastname'] = 'Vul je familienaam in';
    }
    if (empty($data['email'])) {
      $errorsContact['email'] = 'Vul je e-mailadres in';
    }
    if (empty($data['subject'])) {
      $errorsContact['subject'] = 'Vul een onderwerp in';
    }
    if (empty($data['message'])) {
      $errorsContact['message'] = 'Schrijf een bericht';
    }
    return $errorsContact;
  }
}
