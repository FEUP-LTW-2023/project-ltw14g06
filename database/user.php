<?php

//Should verify if these new things are valid to prevent attacks
function createUser($username, $name, $password, $email){
    global $dbh;
    try {
        $stmt = $dbh->prepare('INSERT INTO users (username,name,password,email) VALUES (:username,:name,:password,:email)');
        $hashP = password_hash($password, PASSWORD_DEFAULT);
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

function usernameIsRegistered($username){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT username FROM users WHERE username = ?');
      $stmt->execute(array($username));
      if($stmt->fetch() !== false) return true;    
    }catch(PDOException $error) {
      return true;
    }
}

function emailIsValid($email){
    //checks if email format is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    else {

        list($username, $domain) = explode('@', $email);

        //checks if the domain exists
        if(checkdnsrr($domain, 'MX')) {
            return true;
        }
        //if it doesn't...
        else {
            return false;
        }
    }
}

function passwordIsValid($password){
    if(strlen($password) < 8){
        echo "Password must be at least 8 characters long";
        return false;
    }
    else if(!preg_match("/[A-Z]/", $password)){
        echo "Password must contain a capital letter";
        return false;
    }
    else return true;
}

function emailIsRegistered($email){
    global $dbh;
    try {
      $stmt = $dbh->prepare('SELECT username FROM users WHERE email = ?');
      $stmt->execute(array($email));
      if($stmt->fetch() !== false) return true;
    }catch(PDOException $error) {
      return true;
    }
}


function isLoginCorrect($username, $password) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT password FROM users WHERE username = ?');
        $stmt->execute(array($username));
        if(($hashP = $stmt->fetch()) !== false){
            return password_verify($password, $hashP['password']);
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
            $stmt = $dbh->prepare('SELECT username,name,email,type FROM users WHERE username = ?');
            $stmt->execute(array($username));
            return $stmt->fetch();
        } catch(PDOException $error) {
            echo $error->getMessage();
            return null;
        }
    }
    
//Should verify if these new things are valid to prevent attacks
function changeUserData($username, $newUsername, $name, $password, $email){
    global $dbh;
    try{
        if($name !== ""){
            $stmt = $dbh->prepare('UPDATE users SET name = ? WHERE username = ?');
            $stmt->execute(array($name, $username));
        }
        if($email !== ""){
            $stmt = $dbh->prepare('UPDATE users SET email = ? WHERE username = ?');
            $stmt->execute(array($email, $username));
        }
        if($newUsername !== ""){
            $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
            $stmt->execute(array($newUsername));
            if($stmt->fetch() !== false){
                echo "<script>console.log('Username taken');</script>";
            } 
            else{
                $stmt = $dbh->prepare('UPDATE users SET username = ? WHERE username = ?');
                $stmt->execute(array($newUsername, $username));
                echo "<script>console.log('Username updated');</script>";
            }
        }
        else{
            echo "<script>console.log('Username not inserted');</script>";
        }
        if($password !== ""){
            $hashP = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $dbh->prepare('UPDATE users SET password = ? WHERE username = ?');
            $stmt->execute(array($hashP, $username));
        }
    } catch(PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

?>