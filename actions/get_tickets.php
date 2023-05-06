<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $user_id = getUserID($_SESSION["username"]);

    $tickets = getClientActiveTickets($user_id);

?>