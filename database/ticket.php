<?php

function getTicketID($sender_id){
    global $dbh;
    echo '<p>testdwanjkawndjkawn</p>';
    try{
        $stmt = $dbh->prepare("SELECT id FROM tickets WHERE user_id = ? ORDER BY id desc limit 1");
        $stmt->execute(array($sender_id));
        return $stmt->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getClientActiveTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status = 'open' or status = 'assigned') order by id desc" );
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

//falta fazer a cena do department e da priority
function addTicket($id, $subject, $text){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO tickets (user_id, agent_id, department_id, subject) values (:user_id,:agent_id,:department_id,:subject)');
        $agent_id = 1;
        $dep_id = 1;
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':agent_id', $agent_id);
        $stmt->bindParam(':department_id', $dep_id);
        $stmt->bindParam(':subject', $subject);
        //$stmt->bindParam(':priority', 'low');
        $stmt->execute();
        $ticketMsg = getTicketID($id);
        addTicketMessage($ticketMsg["id"], $id, $text);
    } catch (PDOException $error) {
        echo $error->getMessage();
        //return -1;
    }
}

function addTicketMessage($id, $sender_id, $text){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO ticket_messages (ticket_id, sender_id, receiver_id, message) values (:ticket_id,:sender_id,:receiver_id,:message)');
        $stmt->bindParam(':ticket_id', $id);
        $stmt->bindParam(':sender_id', $sender_id);
        $receiver_id = 0;
        $stmt->bindParam(':receiver_id', $receiver_id);
        $stmt->bindParam(':message', $text);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

?>