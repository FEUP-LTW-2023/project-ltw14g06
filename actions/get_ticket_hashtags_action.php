<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/hashtags.php');
    include_once('../database/department.php');

    $ticket = getTicketData($_GET["ticket_id"]);

    $text = htmlentities(getTicketText($ticket["id"]));
    $department = getDepartmentName($ticket["department_id"]);
    $postedBy = getUserDataByID($ticket["user_id"])["username"];
    $assigned = getUserDataByID($ticket["agent_id"])["username"];

    $showTicket = array(
        "id" => $ticket["id"],
        "username" => $postedBy, 
        "subject" => htmlentities($ticket["subject"]),
        "text" => $text, 
        "department" => $department, 
        "priority" => $ticket["priority"],
        "status" => $ticket["status"],
        "assigned" => $assigned
    );
    
    header("Content-Type: application/json");
    echo json_encode($showTicket);
    exit();
?>