<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    #$user_id = getUserID($_SESSION["username"]);
    $tickets = getClientActiveTickets($_SESSION["id"]);

    $showTickets = array();
    foreach ($tickets as $ticket) {
        $text = getTicketText($ticket["id"])["message"];

        $showTicket = array("id" => $ticket["id"], "user_id" => $ticket["user_id"], "username" => $_SESSION["username"], "subject" => $ticket["subject"], "text" => $text);
        array_push($showTickets, $showTicket);
    }
    header("Content-Type: application/json");
    echo json_encode($showTickets);
    exit();
?>