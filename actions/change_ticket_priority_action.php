<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');

    if(isset($_POST['ticket_priority'])){
        updateTicketPriority( $_POST["ticket_id"], $_POST['ticket_priority']);
    }
    header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
