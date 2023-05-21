<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');
    include_once('../database/status.php');
    include_once('../database/priority.php');

    $validOrders = ["id", "status_id", "priority_id", "hashtag"];

    if (isset($_GET["order"]) && isset($_GET["sort"])) {
        if ($_GET["sort"] !== "asc" && $_GET["sort"] !== "desc") {
            $tickets = getAllDepartmentTickets($user["department_id"]);
        } else if (in_array($_GET["order"], $validOrders)) {
            $tickets = getAllDepartmentTickets($user["department_id"], $_GET["order"], $_GET["sort"]);
        } else {
            $tickets = getAllDepartmentTickets($user["department_id"]);
        }
    } else {
        $tickets = getAllDepartmentTickets($user["department_id"]);
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