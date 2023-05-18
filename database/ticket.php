<?php

function getTicketID($sender_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT id FROM tickets WHERE user_id = ? ORDER BY id desc limit 1");
        $stmt->execute(array($sender_id));
        return $stmt->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getTicketData($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE id = ?");
        $stmt->execute(array($id));
        return $stmt->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getTicketStatus($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT status.name FROM status JOIN tickets ON tickets.status_id = status.id WHERE tickets.id = ?");
        $stmt->execute(array($id));
        return $stmt->fetch()["name"];
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getTicketHashtags($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM ticket_hashtags WHERE ticket_id = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getTicketText($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT message FROM ticket_messages WHERE ticket_id = ? ORDER BY id asc limit 1");
        $stmt->execute(array($id));
        $result = $stmt->fetch();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    if($result === false){
        return "Text not found!";
    }
    else return $result["message"];
}


function getTicketAnswers($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM ticket_messages WHERE ticket_id = ? ORDER BY id ASC");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getUserActiveTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status_id != 2) order by id desc");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getUserClosedTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status_id = 2) order by id desc");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getUserTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? order by id desc");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getAllActiveTickets($order = 'id', $sort = 'desc'){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets where status_id != 2 ORDER BY $order $sort");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getAllDepartmentTickets($dep_id, $order = 'id', $sort = 'desc'){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE department_id = ? and (status_id != 2) ORDER BY $order $sort");
        $stmt->execute(array($dep_id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getAssignedTickets($agent_id, $order = 'id', $sort = 'desc'){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE agent_id = ? ORDER BY $order $sort");
        $stmt->execute(array($agent_id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getTicketsWithStatus($status_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE status_id = ?");
        $stmt->execute(array($status_id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function addTicketMessage($id, $sender_id, $text){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO ticket_messages (ticket_id, sender_id, message) values (:ticket_id,:sender_id,:message)');
        $stmt->bindParam(':ticket_id', $id);
        $stmt->bindParam(':sender_id', $sender_id);
        $stmt->bindParam(':message', $text);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function addTicket($id, $subject, $text, $dep_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO tickets (user_id, agent_id, department_id, subject) values (:user_id,:agent_id,:department_id,:subject)');
        $agent_id = 0;
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':agent_id', $agent_id);
        $stmt->bindParam(':department_id', $dep_id);
        $stmt->bindParam(':subject', $subject);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $ticketID = getTicketID($id)['id'];
            addTicketMessage($ticketID, $id, $text);
            return $ticketID;
        } else {
            throw new PDOException('Failed to insert ticket');
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function addTicketHashtag($ticket_id,$hashtag_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare('INSERT INTO ticket_hashtags (ticket_id, hashtag_id) values (:ticket_id,:hashtag_id)');
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->bindParam(':hashtag_id', $hashtag_id);
        $stmt->execute();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function updateTicketStatus($id, $status_id) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET status_id=? WHERE id=?');
        $stmt->execute(array($status_id,$id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function updateTicketAssignment($id, $assigned){
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET agent_id=? WHERE id=?');
        $stmt->execute(array($assigned,$id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function updateTicketDepartment($id, $department){
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET department_id=?, agent_id = 0 WHERE id=?');
        $stmt->execute(array($department,$id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function updateTicketPriority($id, $priority) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET priority=? WHERE id=?');
        $stmt->execute(array($priority,$id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function removeTicketAssignment($id){
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET agent_id=? WHERE id=?');
        $agent_id = 0;
        $stmt->execute(array($agent_id,$id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function deleteTicketHashtag($ticket_id, $hashtag_id){
    global $dbh;
    try{
        $stmt = $dbh->prepare('DELETE FROM ticket_hashtags WHERE ticket_id = ? AND hashtag_id = ?');
        $stmt->execute(array($ticket_id, $hashtag_id));
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}


?>