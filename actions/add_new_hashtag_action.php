<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');

    if(hashtagAlreadyExists(htmlentities($_POST["new_hashtag"]))){
        header("Location:../pages/add_entities.php");
    }
    else if(hasHashtag(htmlentities($_POST["new_hashtag"])) and ((addNewHashtag(htmlentities($_POST["new_hashtag"]))) !== -1)){
        header("Location:../pages/add_entities.php");
    }
    else{
        header("Location:../pages/add_entities.php");  
    }
?>