<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    if(isLoginCorrect($_POST["username"],$_POST["password"])){
        setCurrentUser($_POST['username']);
        header("Location:../pages/home.php");	
    }
    else{
        $_SESSION['ERROR'] = 'Wrong credentials';
        echo "<script>console.log('Wrong credentials');</script>";
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>