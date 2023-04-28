<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    //check if email is valid
    if(!emailIsValid($_POST['email'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        //escrever "email does not exist"
    }
    //check if email is already in the database
    else if(emailIsRegistered($_POST['email'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        //escrever "that email is already in use"
    }
    //check if username is already in the database (there can't be 2 users with the same username)
    else if(usernameIsRegistered($_POST['username'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        //escrever "that username is already in use"
    }
    //check if password and confirm password match
    else if($_POST['password'] !== $_POST['confirmPassword']){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        //escrever "passwords do not match"
    }
    //try to register user in the database
    else if((createUser($_POST['username'], $_POST['name'], $_POST['password'], $_POST['email'])) !== -1) {
        setCurrentUser($_POST['username']);
        header("Location:../pages/home.php");	
    }
    //if it fails...
    else{
        $_SESSION['ERROR'] = 'ERROR';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>