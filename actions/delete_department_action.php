<?php
    include_once('../utils/init.php');
    include_once('../database/department.php');
    include_once('../database/ticket.php');
    include_once('../actions/validate_csrf_action.php');

    $tickets = getTicketsWithDepartment($_POST["id"]);

    foreach ($tickets as $ticket) {
        updateTicketDepartment($ticket["id"], 0);
    }

    deleteDepartment($_POST["id"]);
?>