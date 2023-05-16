<?php
    include_once('../utils/init.php');
    include_once('../database/faq_functions.php');

    updateFAQ($_POST["id"],$_POST["question"],$_POST["answer"]);
?>