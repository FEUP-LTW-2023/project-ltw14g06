<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    //check if email is valid
    if(!emailIsValid($_POST['email'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION['email_invalid'] = "Email is not valid";
    }
    //check if email is already in the database
    else if(emailIsRegistered($_POST['email'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION['email_registered'] = "Email is already in use";
    }
    //check if username is already in the database (there can't be 2 users with the same username)
    else if(usernameIsRegistered($_POST['username'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION['username_registered'] = "Username is already in use";
    }
    else if(!passwordIsValid($_POST['password'])){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION['password_invalid'] = "Password must be at least 8 characters long and have at least one capital letter";
    }
    //check if password and confirm password match
    else if($_POST['password'] !== $_POST['confirmPassword']){
        header("Location:".$_SERVER['HTTP_REFERER']."");
        $_SESSION['password_unmatch'] = "Passwords do not match";
    }
    //try to register user in the database
    else if((createUser($_POST['username'], $_POST['name'], $_POST['password'], $_POST['email'])) !== -1) {
        setCurrentUser(getUserID($_POST['username'])['id'],$_POST['username'], 'Client');
        header("Location:../pages/home.php");	
    }

?>