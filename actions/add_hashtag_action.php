<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');
    include_once('../database/ticket.php');

    $hashtag = htmlentities($_POST["add_hashtag"]);
    $ticket_id = $_POST["ticket_id"];

    if(!hasHashtag($hashtag)){
        $hashtag = "#".$hashtag;
    }

    if(hashtagAlreadyExists($hashtag)){
        $hashtag_id = getHashtagID($hashtag);
        addTicketHashtag($ticket_id, $hashtag_id);
        header("Location:../pages/ticket_page.php?id=".$ticket_id);
    }
    else{
        addNewHashtag($hashtag);
        $hashtag_id = getHashtagID($hashtag);
        addTicketHashtag($ticket_id, $hashtag_id);
        header("Location:../pages/ticket_page.php?id=".$ticket_id);
    }
?>