<?php

function createUser($username, $name, $password, $email){
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO users (username,name,password,email) VALUES (?,?,?,?)');
        $hashP = hash("sha256",$password);
        $stmt->execute(array($username,$name, $hashP, $email));     
    } catch (PDOException $error) {
        echo "error";
        return -1;
    }
}

?>