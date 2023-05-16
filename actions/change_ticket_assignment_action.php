<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');

if(isset($_POST['newTicketAgent'])){
    if(usernameIsRegistered($_POST['newTicketAgent'])){
        $newAgent = getUserData($_POST['newTicketAgent']);
        if($newAgent["type"] !== 'Client'){
            updateTicketAssignment($_POST["ticket_id"], $newAgent["id"]);
        }
    }
    else if ($_POST['newTicketAgent'] === ""){
        removeTicketAssignment($_POST["ticket_id"]);
    } 
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
