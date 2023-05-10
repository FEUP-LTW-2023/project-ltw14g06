<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
?>
<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form class="insertNewPost" method="post" id="newTicket">
        <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
        <input type="text" id="ticketSubject" name = "ticketSubject" placeholder="Subject">
        <textarea id="newPostText" name="newPostText" required></textarea>
        <select name="ticketDepartment" id="ticketDepartment">
            <option value=""></option>
            <option value="IT">IT</option>
            <option value="Human Resources">Human Resources</option>
            <option value="Accounting and Finance">Accounting and Finance</option>
            <option value="Production">Production</option>
            <option value="Marketing">Marketing</option>
        </select>
        <button type="submit">Post</button>
    </form>
    <h2>Your Active Tickets:</h2><br>
    <section class="activeTickets">
    </section>
    
    <script src="../scripts/ticket.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 
 