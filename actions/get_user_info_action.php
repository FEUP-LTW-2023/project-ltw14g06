<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/department.php');

    $user = getUserData($_GET["username"]);
    $department = getDepartmentName($user["department_id"]);

    $showUser = array(
        "id" => $user["id"],
        "username" => htmlspecialchars($user["username"]), 
        "name" => htmlspecialchars($user["name"]),
        "email" => htmlspecialchars($user["email"]), 
        "type" => htmlspecialchars($user["type"]),
        "department" => $department
    );
    
    header("Content-Type: application/json");
    echo json_encode($showUser);
    exit();
?>
