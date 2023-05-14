<?php
    include_once('../utils/init.php');
    include_once('../database/department.php');

    if(departmentAlreadyExists(htmlentities($_POST["new_department"]))){
        header("Location:../pages/add_entities.php");
    }
    else if((addNewDepartment(htmlentities($_POST["new_department"]))) !== -1){
        header("Location:../pages/add_entities.php");
    }
?>