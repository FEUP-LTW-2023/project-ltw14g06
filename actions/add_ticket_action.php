    <?php

        include_once('../utils/init.php');
        include_once('../database/user.php');
        include_once('../database/ticket.php');

        //if title is valid, bla bla bla para evitar attacks
        echo '<p>test</p>';
        $ticketSubject = $_POST["ticketSubject"];
        $text = $_POST["newPostText"];
        addTicket($_SESSION["id"],  $ticketSubject, $text);
        header("Location:../pages/home.php");	


    ?>