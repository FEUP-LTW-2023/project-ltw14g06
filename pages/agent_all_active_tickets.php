<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');
    include_once('../database/department.php');

    if(isset($_POST["order"]) && isset($_POST["sort"])){
        $tickets = getAllTickets($_POST["order"], $_POST["sort"]);
    } else {
        $tickets = getAllTickets();
    }
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>
    <form method="post" class="insertNewPost">
        <label for="order">Order by:</label>
        <select name="order" id="order">
            <option value="id">Most Recent</option>
            <option value="status">Status</option>
            <option value="department_id">Department</option>
            <option value="status">Status</option>
            <option value="priority">Priority</option>
        </select>

        <label for="sort">Sorting order:</label>
        <select name="sort" id="sort">
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>

        <button type="submit">Sort</button>
    </form>

    <h2 id="closedTickets">All Active Tickets:</h2><br>
    <section id="allActiveTickets" class="activeTickets">
        <?php
            foreach ($tickets as $ticket) {
                $ticketID = $ticket["id"];
                echo "<p class=subjectTicket><a href='ticket_page.php?id=$ticketID'>" . "Subject: " . $ticket["subject"] . '</a></p>';
                echo "<p class=ticketStatus>" . "Status: " . getTicketStatus($ticket["id"]) . '</p>';
                echo "<p class=ticketText>" . "Text: " . getTicketText($ticket["id"]) . '</p>';
                echo "<p class=ticketDepartment>" . "Department: " . getDepartmentName($ticket["department_id"]) . '</p>';
                echo "<p class=ticketPostedBy>" . "Posted by: " . getUserDataByID($ticket["user_id"])["username"] . '</p>';
            }
        ?>
    </section>
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 