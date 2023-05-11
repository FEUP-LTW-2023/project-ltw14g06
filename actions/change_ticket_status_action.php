<?php
include_once('../utils/init.php');
include_once('../database/ticket.php');

if(isset($_POST['ticket_id']) && isset($_POST['status'])){
    updateTicketStatus($_POST['ticket_id'], $_POST['status']);
    header("Location:../pages/ticket_page.php?id=" . $_POST['ticket_id']);
} else {
    echo "Invalid request.";
}
?>
