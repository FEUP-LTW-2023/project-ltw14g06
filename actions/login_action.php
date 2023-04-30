<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    if(isLoginCorrect($_POST["username"],$_POST["password"])){
        setCurrentUser(getUserId($_POST["username"])['id'], $_POST['username']);
        header("Location:../pages/home.php");	
    }
    else{
        $_SESSION['ERROR'] = 'Wrong credentials';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>