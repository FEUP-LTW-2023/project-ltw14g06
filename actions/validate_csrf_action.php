<?php

if ($_SESSION['csrf'] !== $_POST['csrf']) {
    header('Location:../pages/login.php');
    exit();
}

?>

