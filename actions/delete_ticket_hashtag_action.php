<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');
    include_once('../database/ticket_history.php');
    include_once('../database/hashtags.php');

    $hashtag_id = getHashtagID($_POST["hashtag"]);

    deleteTicketHashtag($_POST["ticket_id"], $hashtag_id);
    hashtagRemoved($_POST["ticket_id"],$_POST["hashtag"],$_SESSION["username"]);

?>