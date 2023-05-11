<?php
include_once('../utils/init.php');
include_once('../database/ticket.php');

if(isset($_POST['ticket_id']) && isset($_POST['status'])){
    $ticketId = updateTicketStatus($_POST['ticket_id'], $_POST['status']);
    echo $ticketId;
} else {
    echo "Invalid request.";
}
?>
