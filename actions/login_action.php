<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    if(!isset($_SESSION['username'])){
        header("Location:pages/login.php");
    } 
    else {
        header("Location:pages/home.php");
    }

    if(isLoginCorrect($_POST["username"],$_POST["password"])){
        echo "<script>console.log('User logged in successfully');</script>";
        setCurrentUser($_POST['username']);
        header("Location:../pages/home.php");	
    }
    else{
        $_SESSION['ERROR'] = 'Wrong credentials';
        echo "<script>console.log('Wrong credentials');</script>";
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>