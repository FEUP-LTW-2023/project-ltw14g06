<?php

include_once('../utils/init.php');
include_once('../database/user.php');
include_once('../database/ticket.php');
include_once('../database/ticket_history.php');

addTicketMessage($_POST["ticket_id"], $_POST['user_id'], preg_replace("/[^a-zA-Z\s,.]/", '', $_POST["newAnswerText"]));
messageAdded($_POST["ticket_id"],preg_replace("/[^a-zA-Z\s,.]/", '', $_POST["newAnswerText"]),$_SESSION["username"]);

header("Location:../pages/ticket_page.php?id=".$_POST["ticket_id"]);

?>