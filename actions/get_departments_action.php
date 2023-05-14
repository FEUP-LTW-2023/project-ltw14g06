<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $departments = getAllDepartments();

    $showDepartments = array();
    foreach ($departments as $department) {

        $showDepartment = array(
            "id" => $department["id"],
            "name" => $department["name"]
        );
        array_push($showDepartments, $showDepartment);
    }
    header("Content-Type: application/json");
    echo json_encode($showDepartments);
    exit();
?>