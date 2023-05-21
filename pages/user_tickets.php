<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');

    $tickets = getUserTickets($_SESSION["id"]);
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
    <input type="hidden" id="user_type" value="<?php echo $_SESSION["type"]; ?>">
    <h2 id="all_tickets" class="ticketPageHeader">Your Tickets:</h2><br>
    

    <section id="user_all_tickets" class="tickets">
    </section>
    <script src="../scripts/get_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 