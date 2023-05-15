<?php
    include_once('../utils/init.php');
    include_once('../database/hashtags.php');

    deleteFromTicketHashtag($_POST["id"]);
    deleteHashtag($_POST["id"]);
?>