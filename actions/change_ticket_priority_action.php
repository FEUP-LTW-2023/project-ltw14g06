<?php
    include_once('../utils/init.php');
    include_once('../database/ticket.php');
    include_once('../database/ticket_history.php');
    include_once('../database/priority.php');
    include_once('../actions/validate_csrf_action.php');

    $validPriority = ["1", "2", "3"];

    if(isset($_POST['ticket_priority'])){

        if(!in_array($_POST['ticket_priority'], $validPriority)){
            header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
            exit();
        }

        updateTicketPriority($_POST["ticket_id"], $_POST['ticket_priority']);
        changedPriority($_POST["ticket_id"],getPriorityName($_POST["old_priority"]),getPriorityName($_POST['ticket_priority']),$_SESSION["username"]);
    }
    header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
