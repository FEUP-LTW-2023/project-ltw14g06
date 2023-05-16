<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');

    #$user_id = getUserID($_SESSION["username"]);
    $tickets = getClientActiveTickets($_SESSION["id"]);

    $showTickets = array();
    foreach ($tickets as $ticket) {
        $text = getTicketText($ticket["id"]);
        $department = getDepartmentName($ticket["department_id"]);

        $showTicket = array("id" => $ticket["id"], "user_id" => $ticket["user_id"], "username" => $_SESSION["username"], "subject" => $ticket["subject"], "text" => $text, "department" => $department, "priority" => $ticket["priority"]);
        array_push($showTickets, $showTicket);
    }
    header("Content-Type: application/json");
    echo json_encode($showTickets);
    exit();
?>