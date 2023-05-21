    <?php

        include_once('../utils/init.php');
        include_once('../database/user.php');
        include_once('../database/ticket.php');
        include_once('../database/department.php');
        include_once('../database/ticket_history.php');
        include_once('../actions/validate_csrf_action.php');

        if(strlen($_POST['subject']) > 80){
            http_response_code(452);
            exit();
        }

        $ticket_id = addTicket($_POST["user_id"],  htmlentities($_POST['subject']), htmlentities($_POST['text']), $_POST["department"]);

        $department = getDepartmentName($_POST["department"]);
        startTicketHistory($ticket_id,$_SESSION["username"], htmlentities($_POST['subject']),htmlentities($_POST['text']), $department);

        exit();


    ?>