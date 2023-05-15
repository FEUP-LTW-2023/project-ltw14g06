<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/hashtags.php');

    $ticket = getTicketData($_GET["ticket_id"]);

    $text = htmlentities(getTicketText($ticket["id"]));
    $department = getDepartmentName($ticket["department_id"]);
    $postedBy = getUserDataByID($ticket["user_id"])["username"];
    $assigned = getUserDataByID($ticket["agent_id"])["username"];

    $hashtags_id = getTicketHashtags($ticket["id"]);
    $hashtags_name = array();
    foreach($hashtags_id as $hashtag_id){
        $hashtag_name = getHashtagName($hashtag_id);
        array_push($hashtags_name, $hashtag_name);
    }

    $showTicket = array(
        "id" => $ticket["id"],
        "username" => $postedBy, 
        "subject" => htmlentities($ticket["subject"]),
        "text" => $text, 
        "department" => $department, 
        "priority" => $ticket["priority"],
        "status" => $ticket["status"],
        "assigned" => $assigned,
        "hashtags" => $hashtags_name
    );
    
    header("Content-Type: application/json");
    echo json_encode($showTicket);
    exit();
?>