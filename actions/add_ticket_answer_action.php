<?php

include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');

addTicketMessage($_POST["ticket_id"], $_POST['user_id'], preg_replace("/[^a-zA-Z\s,.]/", '', $_POST["newAnswerText"]));

header("Location:../pages/ticket_page.php?id=".$_POST["ticket_id"]);

?>