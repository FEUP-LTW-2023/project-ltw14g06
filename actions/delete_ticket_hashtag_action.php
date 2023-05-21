<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');
    include_once('../database/ticket_history.php');
    include_once('../database/hashtags.php');
    include_once('../actions/validate_csrf_action.php');

    $hashtag_id = getHashtagID(htmlentities($_POST["hashtag"]));

    deleteTicketHashtag($_POST["ticket_id"], $hashtag_id);
    hashtagRemoved($_POST["ticket_id"],$_POST["hashtag"],$_SESSION["username"]);

?>