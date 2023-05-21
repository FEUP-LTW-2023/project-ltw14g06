<?php
include_once('../utils/init.php');
include_once('../database/ticket.php');
include_once('../database/user.php');
include_once('../database/status.php');
include_once('../actions/validate_csrf_action.php');
include_once('../database/ticket_history.php');

if(isset($_POST['ticket_id']) && isset($_POST['ticket_status'])){
    updateTicketStatus($_POST['ticket_id'],$_POST['ticket_status']);
    if($_POST['ticket_status']==='1'){
        removeTicketAssignment($_POST['ticket_id']);
        $oldAgent = getUserDataByID($_POST['old_agent']);
        changedAgent($_POST["ticket_id"], $oldAgent["username"], '', getUserData($_POST["user_id"])["username"]);
    }
    changedStatus($_POST["ticket_id"],$_POST["old_status"],getStatusName($_POST['ticket_status']),$_SESSION["username"]);
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
