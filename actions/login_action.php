<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../actions/validate_csrf_action.php');


    if(isLoginCorrect($_POST["username"],$_POST["password"])){
        setCurrentUser(getUserData($_POST["username"])['id'], $_POST['username'], getUserData($_POST["username"])['type']);
        header("Location:../pages/home.php");	
    }
    else{
        $_SESSION['ERROR'] = 'Wrong credentials';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>