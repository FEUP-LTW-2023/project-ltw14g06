<?php

function createUser($username, $name, $password, $email){
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO users (username,name,password,email) VALUES (?,?,?,?)');
        $hashP = hash("sha256",$password);
        $stmt->bindParam(':username', $username);  
        $stmt->bindParam(':name', $name);  
        $stmt->bindParam(':password', $password);  
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function isLoginCorrect($username, $password) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
        $hashP = hash('sha256', $password);
        $stmt->execute(array($username, $hashP));
        if($stmt->fetch()===false){
            echo "Wrong credentials";
        }
    } catch(PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
  }

?>