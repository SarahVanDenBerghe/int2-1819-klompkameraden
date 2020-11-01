<?php

require_once( __DIR__ . '/DAO.php');

class TypeDAO extends DAO {

  public function selectTypes(){
    $sql = "SELECT * FROM `int2_types`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
