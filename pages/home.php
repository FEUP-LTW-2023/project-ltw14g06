<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');

    $departments = getAllDepartments();
    $test = testTicketText();
?>
<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form class="insertNewPost" method="post" id="newTicket">
        <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
        <input type="text" id="ticketSubject" name = "ticketSubject" placeholder="Subject">
        <textarea id="newPostText" name="newPostText" required></textarea>
        <select name="ticketDepartment" id="ticketDepartment">
            <?php
                foreach ($departments as $department) {
                    echo '<option value="' . $department["name"] . '">' . $department["name"] . '</option>';
                }
            ?>
        </select>
        <button type="submit">Post</button>
    </form>
    <h2>Your Active Tickets:</h2><br>
    

    <section class="activeTickets">
    <?php
        foreach ($test as $text) {
            echo '<p>' . $text["id"] . '</p>';
            echo '<p>' . $text["message"] . '</p>';
        }
    ?>
    </section>
    
    <script src="../scripts/ticket.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 
 