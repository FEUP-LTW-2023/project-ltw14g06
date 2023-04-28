<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    if(isLoginCorrect($_SESSION["username"],$_POST["oldPassword"])){
        $newUsername = $_POST['newUsername'];
        $newName = $_POST['newName'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];
        $newEmail = $_POST['newEmail'];

        if(empty($newUsername)) $newUsername = "";
        if(empty($newName)) $newName = "";
        if(empty($newPassword)) $newPassword = "";
        if(empty($confirmNewPassword)) $confirmNewPassword = "";
        if(empty($newEmail)) $newEmail = "";


        echo "<script>console.log('User logged in successfully');</script>";
        if($newPassword==$confirmNewPassword){
            changeUserData($_SESSION['username'], $newUsername, $newName,$newPassword, $newEmail);
        }
        header("Location:../pages/profile.php");	
    }
    else{
        header("Location:../pages/home.php");	
    }

?>