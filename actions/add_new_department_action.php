<?php
    include_once('../utils/init.php');
    include_once('../database/department.php');

    if (departmentAlreadyExists(preg_replace('/[^a-zA-Z0-9]/', '', $_POST["new_department"]))) {
        header("Location: ../pages/add_entities.php");
    } else if (addNewDepartment(preg_replace('/[^a-zA-Z0-9]/', '', $_POST["new_department"])) !== -1) {
        header("Location: ../pages/add_entities.php");
    } else{
        header("Location: ../pages/add_entities.php");
    }
    
?>