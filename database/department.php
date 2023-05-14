<?php

function departmentAlreadyExists($name){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT name FROM departments WHERE name = ?');
      $stmt->execute(array($name));
      if($stmt->fetch() !== false) return true;    
    }catch(PDOException $error) {
      return true;
    }
    return false;
}

function addNewDepartment($name){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO departments (name) values (:name)');
        $stmt->execute(array($name));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function deleteDepartment($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare('DELETE FROM departments WHERE id = ?');
        $stmt->execute(array($id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}


?>
