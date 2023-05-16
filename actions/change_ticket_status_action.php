<?php
include_once('../utils/init.php');
include_once('../database/ticket.php');
include_once('../database/status.php');

if(isset($_POST['ticket_id']) && isset($_POST['ticket_status'])){
    updateTicketStatus($_POST['ticket_id'],$_POST['ticket_status']);
    if($_POST['ticket_status']==='1'){
        removeTicketAssignment($_POST['ticket_id']);
    }
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
