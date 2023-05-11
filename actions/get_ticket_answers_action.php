<?php
    include_once('../utils/init.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $Answers = getTicketAnswers($_GET["ticket_id"]);

    $showAnswers = array();
    foreach ($Answers as $answer) {
        $text = htmlentities($answer["message"]);
        $postedBy = getUserDataByID($answer["sender_id"])["username"];

        $showAnswer = array(
            "id" => $answer["id"],
            "postedBy" => $postedBy, 
            "text" => $text,
            "createdAt" => $answer["created_at"]
        );
        array_push($showAnswers, $showAnswer);
    }
    header("Content-Type: application/json");
    echo json_encode($showAnswers);
    exit();
?>