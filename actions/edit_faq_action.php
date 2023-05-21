<?php
    include_once('../utils/init.php');
    include_once('../database/faq_functions.php');
    include_once('../actions/validate_csrf_action.php');

    updateFAQ($_POST["id"],htmlentities($_POST["question"]),htmlentities($_POST["answer"]));
?>