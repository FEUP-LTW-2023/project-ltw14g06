<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $admin = getUserDataByID($_SESSION["id"]);
    
    if(isset($_POST["username"])){
        $user = getUserData($_POST["username"]);
    }
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 