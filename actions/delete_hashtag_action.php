<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');
    include_once('../actions/validate_csrf_action.php');

    deleteFromTicketHashtag($_POST["id"]);
    deleteHashtag($_POST["id"]);
?>