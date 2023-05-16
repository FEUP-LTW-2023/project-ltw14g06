<?php
    include_once('init.php');
    if($_SESSION["type"] !== 'Admin'){
        header("Location: ../pages/home.php");
    }
?>