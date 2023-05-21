<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <h2 id="active_tickets" class="ticketPageHeader">Your Active Tickets:</h2><br>
    <section id="user_active_tickets" class="tickets">
    </section>
    <script src="../scripts/get_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 