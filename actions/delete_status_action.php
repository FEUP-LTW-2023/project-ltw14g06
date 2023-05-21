<?php
    include_once('../utils/init.php');
    include_once('../database/status.php');
    include_once('../database/ticket.php');
    include_once('../actions/validate_csrf_action.php');
    
    $tickets = getTicketsWithStatus($_POST["id"]);

    foreach ($tickets as $ticket) {
        if($ticket["agent_id"]===0){
            updateTicketStatus($ticket["id"], 1); //open
        }
        else{
            updateTicketStatus($ticket["id"], 3); //assigned
        }   
    }

    deleteStatus($_POST["id"]);
?>