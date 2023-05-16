<?php

function getStatus(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM status");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getStatusID($name){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT id FROM status where name = ?");
        $stmt->execute(array($name));
        return $stmt->fetch()["id"];
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function addNewStatus($name){
    global $dbh;
    try{
        $stmt = $dbh->prepare("INSERT INTO status (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function deleteStatus($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("DELETE FROM status where id = ?");
        $stmt->execute(array($id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function statusAlreadyExists($name){
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT name FROM status WHERE name = ?');
        $stmt->execute(array($name));
        if($stmt->fetch() !== false) return true;    
    } catch(PDOException $error) {
        return true;
    }   
}
?>