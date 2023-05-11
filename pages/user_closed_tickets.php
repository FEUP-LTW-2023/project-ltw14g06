<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');

    $tickets = getClientClosedTickets($_SESSION["id"]);
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <h2 id="closedTickets">Your Closed Tickets:</h2><br>
    

    <section id="closedTickets" class="activeTickets">
        <?php
            foreach ($tickets as $ticket) {
                echo "<p class=subjectTicket>" . "Subject: " . $ticket["subject"] . '</p>';
                echo "<p class=ticketText>" . "Text: " . getTicketText($ticket["id"]) . '</p>';
                echo "<p class=ticketDepartment>" . "Department: " . getDepartmentName($ticket["department_id"]) . '</p>';
                echo "<p class=ticketPostedBy>" . "Posted by: " . $_SESSION["username"] . '</p>';
            }
        ?>
    </section>
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 