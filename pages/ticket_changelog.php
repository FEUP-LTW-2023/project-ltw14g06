<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket_history.php');

    $ticket_id = $_GET['id'];
    $changelog = getTicketHistory($ticket_id);
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <section id="full_ticket_history">
        <?php foreach ($changelog as $change) { ?>
            <div class="logMessage">
                <p><?php echo "[". $change["updated_at"] . "]" . $change["text"]?></p>
            </div>
        <?php } ?>
    </section>
</body>
<?php

    include_once('../templates/footer.php');
    
?>
