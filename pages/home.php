<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');

    $departments = getAllDepartments();
?>
<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <section class = "ticketContainer">
        <form class="insertNewPost" method="post" id="newTicket">
            <header>
                <h2>Ticket</h2>
            </header>
            <div id="hiddenDiv">
                <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            </div>
            <div class="homeInput">
                <input type="text" id="ticketSubject" name = "ticketSubject" placeholder="Subject">
            </div>
            <div class="homeInput">
                <textarea id="newPostText" name="newPostText" placeholder="Write Here" required></textarea>
            </div>
            <div class="homeInput">
                <select name="ticketDepartment" id="ticketDepartment">
                    <?php
                        foreach ($departments as $department) {
                            echo '<option value="' . $department["name"] . '">' . $department["name"] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <button type="submit">Post</button>
        </form>
    </section>
    <!--
    <h2>Your Active Tickets:</h2><br>
    

    <section class="activeTickets">
    </section>
    -->
    
    <!--<script src="../scripts/ticket.js" defer></script>-->
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 
 