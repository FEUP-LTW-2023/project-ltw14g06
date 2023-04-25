<?php
    include_once('session.php');
    include_once('../database/connection.php');

    if(isset($_SESSION['ERROR'])){
        $error = $_SESSION['ERROR'];
        unset($_SESSION['ERROR']);    
    } else {
      $error = "";
    }

    if((getUsername() === null) && basename($_SERVER['PHP_SELF']) != 'register.php'){
        header('Location:../pages/login.php');
    }
        
?>