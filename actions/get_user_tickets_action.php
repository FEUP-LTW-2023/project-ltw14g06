<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');
    include_once('../database/status.php');

    $tickets = getUserTickets($_SESSION["id"]);

    $showTickets = array();
    foreach ($tickets as $ticket) {
        $text = getTicketText($ticket["id"]);
        $department = getDepartmentName($ticket["department_id"]);
        $status = getTicketStatus($ticket["id"]);
        $username = getUserDataByID($ticket["user_id"])["username"];
        $date = 'Posted ' . date('Y/m/d H:i', strtotime($ticket["created_at"]));

        $showTicket = array(
            "id" => $ticket["id"], 
            "user_id" => $ticket["user_id"], 
            "username" => $username, 
            "subject" => $ticket["subject"], 
            "text" => $text, 
            "department" => $department, 
            "priority" => $ticket["priority"],
            "status" => $status,
            "created_at" => $date
        );
        array_push($showTickets, $showTicket);
    }
    header("Content-Type: application/json");
    echo json_encode($showTickets);
    exit();
?>