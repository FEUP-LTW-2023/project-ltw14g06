<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');

    //check if email is valid
    if(!emailIsValid($_POST['email'])){
        http_response_code(452);
    }
    //check if email is already in the database
    else if(emailIsRegistered($_POST['email'])){
        http_response_code(453);
    }
    //check if username is already in the database (there can't be 2 users with the same username)
    else if(usernameIsRegistered($_POST['username'])){
        http_response_code(454);
    }
    else if(!passwordIsValid($_POST['password'])){
        http_response_code(455);
    }
    //check if password and confirm password match
    else if($_POST['password'] !== $_POST['confirmPassword']){
        http_response_code(456);
    }
    //try to register user in the database
    else if((createUser($_POST['username'], $_POST['name'], $_POST['password'], $_POST['email'])) !== -1) {
        setCurrentUser(getUserID($_POST['username'])['id'],$_POST['username'], 'Client');
        exit();
    }
    else {
        http_response_code(500);
        echo json_encode(array('message' => 'Internal server error'));
    }

?>