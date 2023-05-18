    <?php

        include_once('../utils/init.php');
        include_once('../database/user.php');
        include_once('../database/ticket.php');
        include_once('../database/department.php');
        include_once('../database/ticket_history.php');

        //if title is valid, bla bla bla para evitar attacks
        /*
        if (!preg_match("/^[a-zA-Z.,\s]+$/", $_POST["subject"]) or !preg_match("/^[a-zA-Z.,\s]+$/", $_POST["text"])) {
            // ERROR: Name can only contain letters and spaces
        }
        else{
           
        }
        */
        $ticket_id = addTicket($_POST["user_id"],  preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['subject']), preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['text']), $_POST["department"]);
        //addTicket($_POST["user_id"],  $_POST["subject"], $_POST["text"], $departmentID);

        $department = getDepartmentName($_POST["department"]);
        startTicketHistory($ticket_id,$_SESSION["username"], preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['subject']),preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['text']), $department);


        exit();


    ?>