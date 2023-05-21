<?php
    include_once('../utils/init.php');
    include_once('../database/status.php');
    include_once('../actions/validate_csrf_action.php');

    if (statusAlreadyExists(preg_replace('/[^a-zA-Z0-9]/', '', $_POST["new_status"]))) {
        header("Location: ../pages/add_entities.php");
    } else if (addNewStatus(preg_replace('/[^a-zA-Z0-9]/', '', $_POST["new_status"])) !== -1) {
        header("Location: ../pages/add_entities.php");
    } else {
        header("Location: ../pages/add_entities.php");
    }
    
?>