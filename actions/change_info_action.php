<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../actions/validate_csrf_action.php');

    if(isLoginCorrect($_SESSION['username'],$_POST["oldPassword"])){
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

        if($newPassword===$confirmNewPassword){
            if(changeUserData($_SESSION['username'], $newUsername, $newName,$newPassword, $newEmail));
                setCurrentUser($_SESSION['id'],$newUsername,$_SESSION["type"]);
        }
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
    else{
        header("Location:../pages/home.php");	
    }

?>
