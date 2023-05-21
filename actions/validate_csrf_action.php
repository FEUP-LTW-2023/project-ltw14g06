<?php

if ($_SESSION['csrf'] !== $_POST['csrf']) {
    header('Location:../pages/login.php');
    exit();
}

/*
<input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
include_once('../actions/validate_csrf_action.php');
*/


?>

