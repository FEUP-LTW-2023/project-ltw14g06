<?php
    session_start();

    function setCurrentUser($username) {
        $_SESSION['username'] = $username;

        /*maybe seja suposto usar cookies e eu nn sei, mas por enquanto fiz assim ig*/
        global $dbh;

        $stmt = $dbh->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $name = $user['name'];
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $user['email'];
            $_SESSION['type'] = $user['type'];
        } else {
            header('Location: ../pages/home.php');
        }
    }

    function getUsername() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else {
            return null;
        }
    }
?>