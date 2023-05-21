<?php
    include_once('../utils/init.php');
    include_once('../database/faq_functions.php');

    if(questionAlreadyExists(htmlentities($_POST["newFAQQuestion"]))){
        header("Location:../pages/manage_faq.php");
    }
    else if((insertFAQ(htmlentities($_POST["newFAQQuestion"]), htmlentities($_POST["newFAQAnswer"]))) !== -1){
        header("Location:../pages/manage_faq.php");
    }
?>