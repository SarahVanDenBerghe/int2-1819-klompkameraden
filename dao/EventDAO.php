<?php

require_once( __DIR__ . '/DAO.php');

class EventDAO extends DAO {

  public function selectAllEvents($types = false, $price = false){
    $sql = "SELECT DISTINCT int2_events.id, int2_events.name, int2_events.price, int2_events.slug, int2_events.image, int2_events.date 
    FROM `int2_events` 
    INNER JOIN `int2_events_types`
    ON `int2_events_types`.`event_id` = `int2_events`.`id`
    INNER JOIN `int2_types`
    ON `int2_events_types`.`type_id` = `int2_types`.`id`
    WHERE 1";
    
  $bindValues = array();

    // FILTER TYPES
    if (!empty($types)) {
        $typeParams = "";
        $types;
          foreach($types as $index => $value){
            $typeParams .= ":type_id_".$index.",";
            $bindValues[":type_id_".$index] = $value;
        } 
        $typeParams = rtrim($typeParams,",");
        $sql .= " AND int2_types.id IN ($typeParams)";
      }

    // FILTER PRIJS
    if (!empty($price && $price == 'gratis')) {
       $sql .= " AND `price` = 0";
    } else if (!empty($price && $price == 'betalend')){
       $sql .= " AND `price` > 0";
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($bindValues);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($id){
    $sql = "SELECT * FROM `int2_events` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}