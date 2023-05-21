<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../actions/validate_csrf_action.php');

    if(isLoginCorrect($_SESSION['username'],$_POST["oldPassword"])){

        $newUsername = $_POST['username'];
        $newName = $_POST['name'];
        $newPassword = $_POST['password'];
        $confirmNewPassword = $_POST['confirmPassword'];
        $newEmail = $_POST['email'];
        if(empty($newUsername)) $newUsername = "";
        if(empty($newName)) $newName = "";
        if(empty($newPassword)) $newPassword = "";
        if(empty($confirmNewPassword)) $confirmNewPassword = "";
        if(empty($newEmail)) $newEmail = "";

        if(!emailIsValid($newEmail) && $newEmail!==""){
            http_response_code(452);
        }
        //check if email is already in the database
        else if(emailIsRegistered($newEmail) && $newEmail!==""){
            http_response_code(453);
        }
        //check if username is already in the database (there can't be 2 users with the same username)
        else if(usernameIsRegistered($newUsername) && $newUsername!==""){
            http_response_code(454);
        }
        else if(!passwordIsValid($newPassword) && $newPassword!==""){
            http_response_code(455);
        }
        //check if password and confirm password match
        else if($newPassword !== $confirmNewPassword){
            http_response_code(456);
        }
        //try to register user in the database
        else if(changeUserData($_SESSION['username'], $newUsername, $newName,$newPassword, $newEmail)){
            if($newUsername!==""){
                setCurrentUser($_SESSION['id'],$newUsername,$_SESSION["type"]);
            }   
        }
        else {
            http_response_code(500);
        }
    }
    else{
        http_response_code(457);
    }

?>
