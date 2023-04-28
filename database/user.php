<?php

//Should verify if these new things are valid to prevent attacks
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
            if($name != ""){
                $stmt = $dbh->prepare('UPDATE users SET name = ? WHERE username = ?');
                $stmt->execute(array($name, $username));
            }
            if($email != ""){
                $stmt = $dbh->prepare('UPDATE users SET email = ? WHERE username = ?');
                $stmt->execute(array($email, $username));
            }


            //This doesn't work since it's primary key and foreign key of other db items. precisariamos de mudar para PRAGMA foreign_keys = DEFERRED;
            //Maybe será melhor usar o id como PK?
            if($newUsername != ""){
                $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
                $result = $stmt->execute(array($newUsername));
                if($result !== false){
                    echo "<script>console.log('Username taken');</script>";
                } else{
                    $stmt = $dbh->prepare('UPDATE users SET username = ? WHERE username = ?');
                    $stmt->execute(array($newUsername, $username));
                    echo "<script>console.log('Username updated');</script>";
                }
            }

            
            else{
                echo "<script>console.log('Username not inserted');</script>";
            }


            if($password != ""){
                $hashP = hash('sha256',$password);
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