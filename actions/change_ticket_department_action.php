<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');

if(isset($_POST['ticketDepartment'])){
    updateTicketDepartment( $_POST["ticket_id"], $_POST['ticketDepartment']);
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
