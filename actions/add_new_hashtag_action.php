<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');
    include_once('../actions/validate_csrf_action.php');

    $hashtag = preg_replace('/[^a-zA-Z0-9]/', '', $_POST["new_hashtag"]);


    if(!hasHashtag($hashtag)){
        $hashtag = '#' . $hashtag;
    }

    if(hashtagAlreadyExists($hashtag)){
        header("Location:../pages/add_entities.php");
    }
    else if((addNewHashtag($hashtag) !== -1)){
        header("Location:../pages/add_entities.php");
    }
    else{
        header("Location:../pages/add_entities.php");  
    }
?>