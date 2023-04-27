<?php
    include_once('session.php');
    session_destroy();
    header("Location:../pages/login.php");
?>