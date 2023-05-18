<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');
    include_once('../database/ticket_history.php');

    if(isset($_POST['ticket_priority'])){
        updateTicketPriority( $_POST["ticket_id"], $_POST['ticket_priority']);
        changedPriority($_POST["ticket_id"],$_POST["old_priority"],$_POST['ticket_priority'],$_SESSION["username"]);
    }
    header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
