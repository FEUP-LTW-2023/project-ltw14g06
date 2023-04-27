<?php

function createUser($username, $name, $password, $email){
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO users (username,name,password,email) VALUES (:username,:name,:password,:email)');
        $hashP = hash("sha256",$password);
        $stmt->bindParam(':username', $username);  
        $stmt->bindParam(':name', $name);  
        $stmt->bindParam(':password', $hashP);  
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function isLoginCorrect($username, $password) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $hashP = hash('sha256', $password);
        $stmt->execute(array($username, $hashP));
        if($stmt->fetch() !== false){
            return true;
        }
        else return false;
    } catch(PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
  }

  function getUserData($username){
        global $dbh;
        try{
            $stmt = $dbh->prepare('SELECT username,name,email FROM users WHERE username = ?');
            $stmt->execute(array($username));
            return $stmt->fetch();
        } catch(PDOException $error) {
            echo $error->getMessage();
            return null;
        }
    }
    
    ///TODO
    function changeUserData($username, $newUsername, $name, $password, $email){
        global $dbh;
        try{
            if($name != ""){
                $stmt = $dbh->prepare('UPDATE users SET name = ? WHERE username = ?');
                $stmt->execute(array($name, $username));
                $_SESSION['name'] = $name;
            }
        } catch(PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

?>