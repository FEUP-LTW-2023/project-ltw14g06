<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');
    include_once('../database/status.php');
    include_once('../database/priority.php');

    $validOrders = ["id", "department_id","status_id", "priority_id", "hashtag"];

    if (isset($_GET["order"]) && isset($_GET["sort"])) {
        if ($_GET["sort"] !== "asc" && $_GET["sort"] !== "desc") {
            $tickets = getAllActiveTickets();
        } else if (in_array($_GET["order"], $validOrders)) {
            $tickets = getAllActiveTickets($_GET["order"], $_GET["sort"]);
        } else {
            $tickets = getAllActiveTickets();
        }
    } else {
        $tickets = getAllActiveTickets();
    }


    $showTickets = array();
    foreach ($tickets as $ticket) {
        $text = html_entity_decode(getTicketText($ticket["id"]));
        $department = getDepartmentName($ticket["department_id"]);
        $status = getTicketStatus($ticket["id"]);
        $username = getUserDataByID($ticket["user_id"])["username"];
        $date = 'Posted ' . date('Y/m/d H:i', strtotime($ticket["created_at"]));
        $priority = getPriorityName($ticket["priority_id"]);

        $showTicket = array(
            "id" => $ticket["id"], 
            "user_id" => $ticket["user_id"], 
            "username" => $username, 
            "subject" => html_entity_decode($ticket["subject"]), 
            "text" => $text, 
            "department" => $department, 
            "priority" => $priority,
            "status" => $status,
            "created_at" => $date
        );
        array_push($showTickets, $showTicket);
    }
    header("Content-Type: application/json");
    echo json_encode($showTickets);
    exit();
?>