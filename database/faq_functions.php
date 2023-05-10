<?php

function getFAQ(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT question,answer FROM FAQ");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function insertFAQ($question, $answer){
    global $dbh;
    try{
        $stmt = $dbh->prepare("INSERT INTO FAQ (question,answer) VALUES (:question,:answer)");
        $stmt->bindParam(':question', $question);
        $stmt->bindParam(':answer', $answer);  
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}
?>