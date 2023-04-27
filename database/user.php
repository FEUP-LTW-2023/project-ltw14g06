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
    return 0;
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
    return 0;
  }

  function getUserData($username){
    /*maybe seja suposto usar cookies e eu nn sei, mas por enquanto fiz assim ig*/
    global $dbh;
    try{
        $stmt = $dbh->prepare('SELECT * FROM users WHERE username = ?');
        //$stmt->bindParam(':username', $username);
        $stmt->execute(array($username));
        $user = $stmt->fetch();
        if ($user) {
            $name = $user['name'];
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $user['email'];
            $_SESSION['type'] = $user['type'];
        } else {
            header('Location: ../pages/home.php');
        }
    } catch(PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return 0;
    }

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
        return 0;
    }

?>