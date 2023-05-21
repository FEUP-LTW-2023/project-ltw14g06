<?php
    include_once('../utils/init.php');
    include_once('../database/faq_functions.php');

    $faq = getFAQ();

    $showFaqs = array();
    foreach ($faq as $qa) {
        $question = html_entity_decode($qa["question"]);
        $answer = html_entity_decode($qa["answer"]);
        $id = $qa["id"];

        $showFaq = array(
            "id" => $id, 
            "question" => $question, 
            "answer" => $answer
        );
        array_push($showFaqs, $showFaq);
    }
    header("Content-Type: application/json");
    echo json_encode($showFaqs);
    exit();
?>