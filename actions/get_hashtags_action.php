<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');

    $hashtags = getAllHashtags();

    $showHashtags = array();
    foreach ($hashtags as $hashtag) {

        $showHashtag = array(
            "id" => $hashtag["id"],
            "name" => $hashtag["name"]
        );
        array_push($showHashtags, $showHashtag);
    }
    header("Content-Type: application/json");
    echo json_encode($showHashtags);
    exit();
?>