<?php

function hasHashtag($name){
  return ($name[0] === '#');
}

function hashtagAlreadyExists($name){
  global $dbh;
  try {
    $stmt = $dbh->prepare('SELECT name FROM hashtags WHERE name = ?');
    $stmt->execute(array($name));
    if($stmt->fetch() !== false) return true;    
  }catch(PDOException $error) {
    return true;
  }
  return false;
}

function getHashtagID($name){
  global $dbh;
  try {
    $stmt = $dbh->prepare('SELECT id FROM hashtags WHERE name = ?');
    $stmt->execute(array($name));
    $result = $stmt->fetch();
    return $result["id"]; 
   }catch(PDOException $error) {
    return false;
  }
}

function getHashtagName($id){
  global $dbh;
  try {
    $stmt = $dbh->prepare('SELECT name FROM hashtags WHERE id = ?');
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


function getAllHashtags(){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT * FROM hashtags');
      $stmt->execute();
      return $stmt->fetchAll();
    }catch(PDOException $error) {
      return true;
    }
}

function addNewHashtag($name){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO hashtags (name) values (:name)');
        $stmt->execute(array($name));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function deleteFromTicketHashtag($hashtag_id){
  global $dbh;
  try{
      $stmt = $dbh->prepare('DELETE FROM ticket_hashtags WHERE hashtag_id = ?');
      $stmt->execute(array($hashtag_id));
  } catch (PDOException $error) {
      echo $error->getMessage();
      return -1;
  }
  return true;
}

function deleteHashtag($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare('DELETE FROM hashtags WHERE id = ?');
        $stmt->execute(array($id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}


?>
