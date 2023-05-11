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
        <li><a href="#">Manage Users</a></li>
        <li><a href="#">Manage Website</a></li>
    </ul>
    <script src="../scripts/menu.js"></script>
</body>
</html>