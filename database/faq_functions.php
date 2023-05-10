<?php

function getFAQ(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM FAQ");
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
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function deleteFAQ($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("DELETE FROM FAQ where id = ?");
        $stmt->execute(array($id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function questionAlreadyExists($question){
    global $dbh;
    try {
        $stmt = $dbh->prepare('SELECT question FROM FAQ WHERE question = ?');
        $stmt->execute(array($question));
        if($stmt->fetch() !== false) return true;    
    } catch(PDOException $error) {
        return true;
    }   
}
?>