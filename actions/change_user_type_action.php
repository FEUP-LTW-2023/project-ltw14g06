<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../actions/validate_csrf_action.php');

if(isset($_POST['user_id']) && isset($_POST['type'])){
    changeUserType($_POST['user_id'], $_POST['type']);
} else {
    echo "Invalid request.";
}

?>