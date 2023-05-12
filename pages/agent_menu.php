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
        <li><a href="#">Assigned Tickets</a></li>
        <li><a href="department_tickets.php">Active Department Tickets</a></li>
        <li><a href="agent_all_active_tickets.php">All Active Tickets</a></li>
        <li><a href="manage_faq.php">Manage FAQ</a></li>
    </ul>
    <script src="../scripts/menu.js"></script>
</body>
</html>