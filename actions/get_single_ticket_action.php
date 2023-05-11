<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $ticket = getTicketData($_GET["ticket_id"]);

    $text = getTicketText($ticket["id"]);
    $department = getDepartmentName($ticket["department_id"]);
    $postedBy = getUserDataByID($ticket["user_id"])["username"];
    $assigned = getUserDataByID($ticket["agent_id"])["username"];

    $showTicket = array(
        "id" => $ticket["id"],
        "username" => $postedBy, 
        "subject" => $ticket["subject"],
        "text" => $text, 
        "department" => $department, 
        "priority" => $ticket["priority"],
        "status" => $ticket["status"]
    );
    
    header("Content-Type: application/json");
    echo json_encode($showTicket);
    exit();
?>