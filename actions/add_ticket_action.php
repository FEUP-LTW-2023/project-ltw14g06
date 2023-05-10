    <?php

        include_once('../utils/init.php');
        include_once('../database/user.php');
        include_once('../database/ticket.php');

        //if title is valid, bla bla bla para evitar attacks
        $departmentID = getDepartmentID($_POST["department"]);
        addTicket($_POST["user_id"],  $_POST["subject"], $_POST["text"], $departmentID);
        exit();


    ?>