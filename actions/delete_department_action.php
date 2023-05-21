<?php
    include_once('../utils/init.php');
    include_once('../database/department.php');
    include_once('../actions/validate_csrf_action.php');

    deleteDepartment($_POST["id"]);
?>