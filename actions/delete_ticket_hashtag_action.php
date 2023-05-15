<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');
    include_once('../database/hashtags.php');

    $hashtag_id = getHashtagID($_POST["hashtag"]);

    deleteTicketHashtag($_POST["ticket_id"], $hashtag_id);
?>