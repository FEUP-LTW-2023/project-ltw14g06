<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');
include_once('../database/ticket_history.php');
include_once('../database/status.php');
include_once('../actions/validate_csrf_action.php');


if(isset($_POST['newTicketAgent'])){
    $status = getTicketStatus($_POST["ticket_id"]);
    if(usernameIsRegistered($_POST['newTicketAgent'])){
        if($_POST['newTicketAgent'] === ''){
            if($_POST['old_agent']==='') return;
            $oldAgent = getUserDataByID($_POST['old_agent']);
            removeTicketAssignment($_POST["ticket_id"]);
            if($status === 'Assigned'){
                updateTicketStatus($_POST['ticket_id'],1);
                changedStatus($_POST["ticket_id"],$_POST["old_status"],"Open",$_SESSION["username"]);
            }
            changedAgent($_POST["ticket_id"], $oldAgent["username"], '', $_SESSION["username"]);
        }
        else{
            $newAgent = getUserData($_POST['newTicketAgent']);
            $oldAgent = getUserDataByID($_POST['old_agent']);
            if($newAgent["type"] !== 'Client'){
                updateTicketAssignment($_POST["ticket_id"], $newAgent["id"]);
                if($status === 'Open'){
                    updateTicketStatus($_POST['ticket_id'],3);
                    changedStatus($_POST["ticket_id"],$_POST["old_status"],"Assigned",$_SESSION["username"]);
                }
                
                changedAgent($_POST["ticket_id"], $oldAgent["username"], $newAgent["username"], $_SESSION["username"]);
            }
        }
        
    }
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
