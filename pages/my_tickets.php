<!DOCTYPE html>
<html lang="en">
<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    $user = getUserData($_SESSION['username']);
?>
<body id = "home_body">
    <?php include_once('../templates/default.php'); ?>
    <ul class="choice-menu">
        <li><a href="user_active_tickets.php">Active Tickets</a></li>
        <li><a href="user_closed_tickets.php">Closed Tickets</a></li>
        <li><a href="user_tickets.php">All Tickets</a></li>
    </ul>
    <script src="../scripts/menu.js"></script>
</body>
</html>