<?php
    function startTicketHistory($ticket_id, $department_id){
        global $dbh;
        try{
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, agent_id, department_id, subject) values (:user_id,:agent_id,:department_id,:subject)');
            $agent_id = 0;
            $stmt->bindParam(':user_id', $id);
            $stmt->bindParam(':agent_id', $agent_id);
            $stmt->bindParam(':department_id', $department_id);
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
?>