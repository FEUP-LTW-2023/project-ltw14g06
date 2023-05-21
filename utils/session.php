<?php
    session_start();

    if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = generate_random_token();
    }

    function generate_random_token() {
        return bin2hex(openssl_random_pseudo_bytes(32));
      }

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