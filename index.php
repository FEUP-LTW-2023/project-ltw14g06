<?php
    include_once('utils/init.php');
    if(!isset($_SESSION['username'])){
        header("Location:pages/login.php");
      } else {
            header("Location:pages/home.php");
      }
?>