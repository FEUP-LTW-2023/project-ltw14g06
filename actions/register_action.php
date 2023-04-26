<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    //falta ver se email e username colocados ja existem na base de dados

    if ((createUser($_POST['username'], $_POST['name'], $_POST['password'], $_POST['email'])) !== -1) {
        echo "<script>console.log('User registered successfully');</script>";
        setCurrentUser($_POST['username']);
        header("Location:../pages/home.php");	
    }
    else{
        $_SESSION['ERROR'] = 'ERROR';
        echo "<script>console.log('Error register');</script>";
        header("Location:../pages/home.php");	
        //header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>