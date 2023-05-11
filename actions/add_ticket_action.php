    <?php

        include_once('../utils/init.php');
        include_once('../database/user.php');
        include_once('../database/ticket.php');

        //if title is valid, bla bla bla para evitar attacks
        $departmentID = getDepartmentID($_POST["department"]);
        /*
        if (!preg_match("/^[a-zA-Z.,\s]+$/", $_POST["subject"]) or !preg_match("/^[a-zA-Z.,\s]+$/", $_POST["text"])) {
            // ERROR: Name can only contain letters and spaces
        }
        else{
           
        }
        */
        addTicket($_POST["user_id"],  preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['subject']), preg_replace("/[^a-zA-Z\s,.]/", '', $_POST['text']), $departmentID);
        //addTicket($_POST["user_id"],  $_POST["subject"], $_POST["text"], $departmentID);
        exit();


    ?>