<?php
    include_once('init.php');
    if($_SESSION["type"] === 'Client'){
        header("Location: ../pages/home.php");
    }
?>