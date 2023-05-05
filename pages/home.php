<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    $tickets = getClientActiveTickets($_SESSION["id"]);

?>
<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form action="../actions/add_ticket_action.php" class="insertNewPost" method="post" id="newTicket">
        <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
        <input type="text" class="ticketSubject" name = "ticketSubject" placeholder="Subject">
        <textarea class="newPostText" name="newPostText"></textarea>
        <button type="submit">Post</button>
    </form>
    <h2>Your Active Tickets:</h2><br>
    <section class="activeTickets">
        <!--
        <?php foreach ($tickets as $ticket) { ?>
            <article class="activeTicket">
                <a href=""></a>
                <p class = subjectTicket>Subject: <?=htmlentities($ticket['subject'])?></p>
                <small>&mdash; <?=htmlentities($ticket['user_id'])?></small>

                
            </article>
        <?php } ?>-->
        <p id="jstickets"></p>
    </section>
    
    <script src="../scripts/ticket.js"></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>