<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');

    $hashtag = htmlentities($_POST["new_hashtag"]);

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