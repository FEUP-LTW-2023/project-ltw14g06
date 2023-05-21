<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');
    include_once('../database/status.php');

    $validOrders = ["id", "status_id", "priority", "hashtag"];

    if (isset($_GET["order"]) && isset($_GET["sort"])) {
        if ($_GET["sort"] !== "asc" && $_GET["sort"] !== "desc") {
            $tickets = getAssignedTickets($_SESSION["id"]);
        } else if (in_array($_GET["order"], $validOrders)) {
            $tickets = getAssignedTickets($_SESSION["id"], $_GET["order"], $_GET["sort"]);
        } else {
            $tickets = getAssignedTickets($_SESSION["id"]);
        }
    } else {
        $tickets = getAssignedTickets($_SESSION["id"]);
    }


    $showTickets = array();
    foreach ($tickets as $ticket) {
        $text = html_entity_decode(getTicketText($ticket["id"]));
        $department = getDepartmentName($ticket["department_id"]);
        $status = getTicketStatus($ticket["id"]);
        $username = getUserDataByID($ticket["user_id"])["username"];
        $date = 'Posted ' . date('Y/m/d H:i', strtotime($ticket["created_at"]));

        $showTicket = array(
            "id" => $ticket["id"], 
            "user_id" => $ticket["user_id"], 
            "username" => $username, 
            "subject" => html_entity_decode($ticket["subject"]), 
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