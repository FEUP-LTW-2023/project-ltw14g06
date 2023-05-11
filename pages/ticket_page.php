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

    <form action="" class="insertNewPost" method="post">
        <div class="changeTicket_inputBox">
            <p>Change Department: <select name="ticketDepartment" id="ticketDepartment">
                <?php
                    foreach ($departments as $department) {
                        echo '<option value="' . $department["name"] . '">' . $department["name"] . '</option>';
                    }
                ?>
            </select></p>
        </div>
        <button type="submit">Submit Change Department</button>
    </form>

    <div class="changeTicket_inputBox">
        <p>Change Status:
            <?php
                if($ticket["status"]=='open' or $ticket["status"]=='assigned'){
                    echo '<button onclick="changeTicketStatus('. $ticketId . ", 'closed'" . ')"> Close </button>';
                } else if($ticket["status"]=='closed' and $ticket["agent_id"] == 0){
                    echo '<button onclick="changeTicketStatus('. $ticketId . ", 'open'" . ')"> Re-open </button>';
                } else {
                    echo '<button onclick="changeTicketStatus('. $ticketId . ", 'assigned'" . ')"> Re-open </button>';
                }
            ?>
        </p>
    </div>

    <div class="changeTicket_inputBox">
        <p>Change Agent Assigned To:</p>
    </div>
    <form action='../actions/change_ticket_assignment_action.php' method="post">
        <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
        <div class="changeTicket_inputBox">
            <input type="text" name="newTicketAgent" placeholder ="Insert the name of the agent you want to assign this to or leave empty to remove any assignment"></input>
        </div>
        <div class="changeTicket_inputBox">
            <button type="submit">Submit Change Assignment</button>
        </div>
    </form>

    <section id="singleTicket" class="activeTickets">
    </section>

    <script src="../scripts/ticket_page.js" defer></script>
    <script>const ticketId = <?php echo $ticketId ?>;</script>
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>
