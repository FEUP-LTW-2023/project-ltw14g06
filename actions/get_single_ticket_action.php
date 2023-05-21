<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/hashtags.php');
    include_once('../database/department.php');
    include_once('../database/priority.php');

    $ticket = getTicketData($_GET["ticket_id"]);

    $text = html_entity_decode((getTicketText($ticket["id"])));
    $department = getDepartmentName($ticket["department_id"]);
    $posted_by = getUserDataByID($ticket["user_id"])["username"];
    $assigned = getUserDataByID($ticket["agent_id"]);
    $assigned_username = $assigned["username"];
    $assigned_name = $assigned["name"];
    $status = getTicketStatus($ticket["id"]);
    $priority = getPriorityName($ticket["priority_id"]);

    $hashtags_id = getTicketHashtags($ticket["id"]);
    $hashtags_name = array();
    foreach($hashtags_id as $hashtag_id){
        $id = $hashtag_id["hashtag_id"];
        $hashtag_name = html_entity_decode(getHashtagName($id));
        array_push($hashtags_name, $hashtag_name);
    }

    $showTicket = array(
        "id" => $ticket["id"],
        "username" => $posted_by, 
        "subject" => html_entity_decode($ticket["subject"]),
        "text" => $text, 
        "department" => $department, 
        "priority" => $priority,
        "status" => $status,
        "assigned_username" => $assigned_username,
        "assigned_name" => $assigned_name,
        "hashtags" => $hashtags_name
    );
    
    header("Content-Type: application/json");
    echo json_encode($showTicket);
    exit();
?>