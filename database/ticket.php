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

function getDepartmentID($name){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT id FROM departments WHERE name = ?");
        $stmt->execute(array($name));
        $result = $stmt->fetch();
        return $result["id"];
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getDepartmentName($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT name FROM departments WHERE id = ?");
        $stmt->execute(array($id));
        $result = $stmt->fetch();
        return $result["name"];
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getAllDepartments(){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM departments");
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getClientActiveTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status = 'Open' or status = 'Assigned') order by id desc");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getClientClosedTickets($id){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE user_id = ? AND (status = 'Closed') order by id desc");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
}

function getClientTickets($id){
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

function getAllTickets($order = 'id', $sort = 'desc'){
    global $dbh;
    try{
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE (status = 'Open' or status = 'Assigned') ORDER BY $order $sort");
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
        $stmt = $dbh->prepare("SELECT * FROM tickets WHERE department_id = ? and (status = 'Open' or status = 'Assigned') ORDER BY $order $sort");
        $stmt->execute(array($dep_id));
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
        } else {
            throw new PDOException('Failed to insert ticket');
        }
    } catch (PDOException $error) {
        echo $error->getMessage();
        return -1;
    }
    return true;
}

function updateTicketStatus($id, $status) {
    global $dbh;
    try {
        $stmt = $dbh->prepare('UPDATE tickets SET status=? WHERE id=?');
        $stmt->execute(array($status,$id));
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

/*needs to be changed to 0 once that account exists. It's 2 for debug purposes*/
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


?>