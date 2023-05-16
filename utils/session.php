<?php
    session_start();

    function setCurrentUser($id, $username, $type) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type;
    }

    function getUsername() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else {
            return null;
        }
    }
?>