<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    function getTickets(){
        if(isset($_POST["order"]) && isset($_POST["sort"])){
            $tickets = getAllTickets($_POST["order"], $_POST["sort"]);
        } else {
            $tickets = getAllTickets();
        }
        header("Location:../pages/agent_all_active_tickets.php");
    }
    
?>