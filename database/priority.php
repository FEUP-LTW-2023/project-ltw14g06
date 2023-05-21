<?php

function getPriorityName($id){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT name FROM priority WHERE id = ?');
      $stmt->execute(array($id));
      $result = $stmt->fetch();
      if ($result) {
        return $result["name"];
      } else {
        return "id not found";
      }
    } catch(PDOException $error) {
      return true;
    }
}

function getPriorityID($name){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT id FROM priority WHERE name = ?');
      $stmt->execute(array($name));
      $result = $stmt->fetch();
      if ($result) {
        return $result["id"];
      } else {
        return "name not found";
      }
    } catch(PDOException $error) {
      return true;
    }
}

?>