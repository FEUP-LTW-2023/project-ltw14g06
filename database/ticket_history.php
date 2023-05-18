<?php

    function messageAdded($ticket_id, $answer, $user){
        global $dbh;
        try{
            $text = " - " . $user . " answered with: '" . $answer . "'";
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function hashtagRemoved($ticket_id, $hashtag, $user){
        global $dbh;
        try{
            $text = " - Removed hashtag " . $hashtag . " by " . $user;
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function hashtagAdded($ticket_id, $hashtag, $user){
        global $dbh;
        try{
            $text = " - Added hashtag " . $hashtag . " by " . $user;
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function changedAgent($ticket_id, $old_agent, $new_agent, $user){
        global $dbh;
        try{
            if($old_agent === '' and $new_agent === ''){
                return;
            } else if($old_agent === ''){
                $text = " - Ticket assigned to " . $new_agent . " by " . $user;
            } else if($new_agent === ''){
                $text = " - Removed ticket assignment from " . $old_agent . " by " . $user;
            } else{
                $text = " - Ticket assignment changed from " . $old_agent . " to " . $new_agent . " by " . $user;
            }
            
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }


    function changedDepartment($ticket_id, $old_department, $new_department, $user){
        global $dbh;
        try{
            if($old_department === '--'){
                $text = " - Department setted as " . $new_department . " by " . $user;
            } else if($new_department === '--'){
                $text = " - " . $old_department . " department removed by " . $user;
            } else{
                $text = " - Department changed from " . $old_department . " to " . $new_department . " by " . $user;
            }
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function changedPriority($ticket_id, $old_priority, $new_priority, $user){
        global $dbh;
        try{
            $text = " - Priority changed from " . $old_priority . " to " . $new_priority . " by " . $user;
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function changedStatus($ticket_id, $old_status, $new_status, $user){
        global $dbh;
        try{
            $text = " - Status changed from " . $old_status . " to " . $new_status . " by " . $user;
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function startTicketHistory($ticket_id, $user, $subject, $ticket_text, $department){
        global $dbh;
        try{
            if($department === '--'){
                $department = "no department";
            }
            $text = " - " . $user . " created ticket ". $ticket_id . " on " . $department . " with subject '" . $subject . "' and text '" . $ticket_text . "'";
            $stmt = $dbh->prepare('INSERT INTO ticket_history (ticket_id, text) values (:ticket_id, :text)');
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->bindParam(':text', $text);
            $stmt->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
        return true;
    }

    function getTicketHistory($ticket_id){
        global $dbh;
        try{
            $stmt = $dbh->prepare("SELECT * FROM ticket_history where ticket_id = ? order by id desc");
            $stmt->execute(array($ticket_id));
            return $stmt->fetchAll();
        } catch (PDOException $error) {
            echo $error->getMessage();
            return -1;
        }
    }
?>