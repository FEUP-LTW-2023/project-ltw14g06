<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    include_once('../database/user.php');
    $ticketId = $_GET['id'];
    $ticket = getTicketData($ticketId);
    $departments = getAllDepartments();
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <form action="" class="insertNewPost">
        <div id="changeTicket_inputBox">
            <p>Change Department: <select name="ticketDepartment" id="ticketDepartment"></p>
                <?php
                    foreach ($departments as $department) {
                        echo '<option value="' . $department["name"] . '">' . $department["name"] . '</option>';
                    }
                ?>
            </select>
        </div>
        <button type="submit">Submit</button>
    </form>

    <form action="" class="insertNewPost">
        <div id="changeTicket_inputBox">
            <p>Change Status:
                <?php
                    if($ticket["status"]=='open' or $ticket["status"]=='assigned'){
                        echo '<button onclick="changeTicketStatus('. $ticketId . ", 'closed'" . ')"> Close </button>';
                    }                     
                ?>
            </p>
        </div>
    </form>

    <section id="singleTicket" class="activeTickets">
        <?php
            echo "<p class=subjectTicket>" . "Subject: " . htmlspecialchars($ticket["subject"]) . '</p>';
            echo "<p class=ticketStatus>" . "Status: " . $ticket["status"] . '</p>';
            echo "<p class=ticketText>" . "Text: " . htmlspecialchars(getTicketText($ticketId)) . '</p>';
            echo "<p class=ticketDepartment>" . "Department: " . getDepartmentName($ticket["department_id"]) . '</p>';
            echo "<p class=ticketPostedBy>" . "Posted by: " . getUserDataByID($ticket["user_id"])["username"] . '</p>';
        ?>
    </section>

    <script src="../scripts/ticket_page.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>
