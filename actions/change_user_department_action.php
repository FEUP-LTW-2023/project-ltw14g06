<?php
include_once('../utils/init.php');
include_once('../database/user.php');

if(isset($_POST['user_id']) && isset($_POST['department_id'])){
    changeUserDepartment($_POST['user_id'], $_POST['department_id']);
} else {
    echo "Invalid request.";
}

?>