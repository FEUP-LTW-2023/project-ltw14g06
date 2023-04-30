<?php
    session_start();

    function setCurrentUser($id, $username) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
    }

    function getUsername() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else {
            return null;
        }
    }
?>