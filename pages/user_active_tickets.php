<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <input type="hidden" id = "csrf" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
    <input type="hidden" id="user_type" value="<?php echo $_SESSION["type"]; ?>">
    <h2 id="active_tickets" class="ticketPageHeader">Your Active Tickets:</h2><br>
    <div id="user_active_tickets" class="tickets">
    </div>
    <script src="../scripts/get_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 