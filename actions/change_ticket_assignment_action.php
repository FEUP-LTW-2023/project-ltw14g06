<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');



if(isset($_POST['newTicketAgent'])){
    $status = getTicketStatus($_POST["ticket_id"]);
    if(usernameIsRegistered($_POST['newTicketAgent'])){
        if($_POST['newTicketAgent'] === ''){
            removeTicketAssignment($_POST["ticket_id"]);
            if($status === 'Assigned'){
                updateTicketStatus($_POST['ticket_id'],1);
            }
        }
        else{
            $newAgent = getUserData($_POST['newTicketAgent']);
            if($newAgent["type"] !== 'Client'){
                updateTicketAssignment($_POST["ticket_id"], $newAgent["id"]);
                if($status === 'Open'){
                    updateTicketStatus($_POST['ticket_id'],3);
                }
            }
        }
        
    }
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
