<?php

function getClientActiveTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status = 'open' or status = 'assigned')");
        $stmt->execute(array($id));
        return $stmt->fetch();
    } catch (PDOException $error) {
        return -1;
    }
}

function addTicket(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("INSERT INTO tickets values ?,?,?,?,?,?,?,?,?");
        $stmt->execute(array($id));
        return $stmt->fetch();
    } catch (PDOException $error) {
        return -1;
    }
}

?>