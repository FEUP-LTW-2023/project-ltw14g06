<?php

function getTicketID($sender_id, $created_at){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT id FROM ticket_messages WHERE sender_id = ? AND created_at = ?");
        $stmt->execute(array($sender_id, $created_at));
        return $stmt->fetch();
    } catch (PDOException $error) {
        return -1;
    }
}

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

//falta fazer a cena do department e da priority
function addTicket(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("INSERT INTO tickets (user_id, agent_id, department_id, subject, priority) values ?,?,?,?,?,?");
        $stmt->execute(array($_SESSION("id"), 0, 0, $_POST("ticketSubject"), 'low'));
        $ticketMsg = getTicketID($_SESSION("id"), );
        addTicketMessage($ticketMsg["ticket_id"], $_SESSION["id"]);
    } catch (PDOException $error) {
        return -1;
    }
}

function addTicketMessage($id, $sender_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("INSERT INTO ticket_messages (ticket_id, sender_id, receiver_id, message) values ?,?,?,?");
        $stmt->execute(array($id, $sender_id, 0,$_POST("newPostText")));
    } catch (PDOException $error) {
        return -1;
    }
}

?>