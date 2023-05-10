<?php
    include_once('../utils/init.php');
    include_once('../database/faq_functions.php');

    if(questionAlreadyExists($_POST["newFAQQuestion"])){
        header("Location:../pages/manage_faq.php");
    }
    else if((insertFAQ($_POST["newFAQQuestion"], $_POST["newFAQAnswer"])) !== -1){
        header("Location:../pages/faq.php");
    }
?>