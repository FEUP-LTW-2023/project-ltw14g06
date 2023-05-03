<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    $tickets = getClientActiveTickets($_SESSION["id"]);

?>
<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form action="../actions/add_ticket_action.php" class="insertNewPost" method="post">
        <input type="text" class="ticketSubject" name = "ticketSubject" placeholder="Subject">
        <textarea class="newPostText" name="newPostText"></textarea>
        <button type="submit">Post</button>
    </form>
    <h2>Your Active Tickets:</h2><br>
    <section class="activeTickets">
        <?php foreach ($tickets as $ticket) { ?>
            <article class="activeTicket">
                <p><?=htmlentities($ticket['subject'])?></p>
                <small>&mdash; <?=htmlentities($ticket['user_id'])?></small>
            </article>
        <?php } ?>
    </section>
    
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>