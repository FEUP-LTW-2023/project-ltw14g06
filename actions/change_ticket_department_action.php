<?php
include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');
include_once('../database/department.php');
include_once('../database/ticket_history.php');
include_once('../actions/validate_csrf_action.php');

$validDepartment = getAllDepartments();

if(isset($_POST['ticket_department'])){
    
    $isValidDepartment = false;
    foreach ($validDepartment as $department) {
        if ($_POST['ticket_department'] == $department['id']) {
            $isValidDepartment = true;
            break;
        }
    }
    if (!$isValidDepartment) {
        header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
        exit();
    }

    
    updateTicketDepartment( $_POST["ticket_id"], $_POST['ticket_department']);
    changedDepartment($_POST["ticket_id"],$_POST["old_department"],getDepartmentName($_POST['ticket_department']),$_SESSION["username"]);
}
header("Location:../pages/ticket_page.php?id=" . $_POST["ticket_id"]);
?>
