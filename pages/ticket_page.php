<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/ticket.php');
    include_once('../database/user.php');
    include_once('../database/faq_functions.php');
    include_once('../database/hashtags.php');
    include_once('../database/department.php');
    include_once('../database/status.php');

    

    $ticketId = $_GET['id'];
    $ticket = getTicketData($ticketId);
    $departments = getAllDepartments();
    $faq = getFAQ();
    $hashtags = getAllHashtags();
    $status = getStatus();
    if($_SESSION["type"]==='Client' and $ticket["user_id"] !== $_SESSION["id"]){
        header("Location: ../pages/home.php");
    }
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <?php if($_SESSION["type"] !== 'Client'){?>

        <a href="../pages/ticket_changelog.php?id=<?php echo $ticketId; ?>" id = ticket_changelog>-----------------------------------------------History</a>

        <form action="../actions/change_ticket_department_action.php" class="editTicketForm" method="post">
            <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
            <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            <input type="hidden" value = "<?php echo getDepartmentName($ticket['department_id']) ?>" name = "old_department">
            <div class="changeTicket_inputBox">
                <p>Change Department: 
                    <select name="ticket_department" id="ticket_department">
                        <?php
                            foreach ($departments as $department) {
                                if($department["id"] === $ticket["department_id"]) continue;
                                echo '<option value="' . $department["id"] . '">' . $department["name"] . '</option>';
                            }
                        ?>
                    </select>   
                </p>
            </div>
            <button type="submit">Submit Change Department</button>
        </form>

        <form action="../actions/change_ticket_priority_action.php" class="editTicketForm" method="post">
            <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
            <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            <input type="hidden" value = "<?php echo $ticket['priority'] ?>" name = "old_priority">
            <div class="changeTicket_inputBox">
                <p>Change Priority: 
                    <select name="ticket_priority" id="ticket_priority">
                        <?php if($ticket["priority"]!=="Low"){?>
                            <option value="Low">Low</option>
                        <?php } if($ticket["priority"]!=="Medium"){?>
                            <option value="Medum">Medium</option>
                        <?php }if($ticket["priority"]!=="High"){ ?>
                            <option value="High">High</option>
                        <?php } ?>
                    </select>   
                </p>
            </div>
            <button type="submit">Submit Change Priority</button>
        </form>

        <form action="../actions/change_ticket_status_action.php" class="editTicketForm" method="post">
            <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
            <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            <input type="hidden" value = "<?php echo $ticket['agent_id'] ?>" name = "old_agent">
            <input type="hidden" value = "<?php echo getStatusName($ticket['status_id']) ?>" name = "old_status">
            <div class="changeTicket_inputBox">
                <p>Change Status: 
                <select name="ticket_status" id="ticket_status">
                        <?php
                            foreach ($status as $singleStatus) {
                                if($singleStatus["id"] === $ticket["status_id"]) continue;
                                if($ticket["agent_id"] === 0 and $singleStatus["id"]===3) continue;
                                echo '<option value="' . $singleStatus["id"] . '">' . $singleStatus["name"] . '</option>';
                            }
                        ?>
                </select>    
                </p>
            </div>
            <button type="submit">Submit Change Status</button>
        </form>

        <div class="changeTicket_inputBox">
            <p>Change Agent Assigned To:</p>
        </div>
        <form action='../actions/change_ticket_assignment_action.php' method="post" class="editTicketForm">
            <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
            <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            <input type="hidden" value = "<?php echo $ticket['agent_id'] ?>" name = "old_agent">
            <input type="hidden" value = "<?php echo getStatusName($ticket['status_id']) ?>" name = "old_status">
            <div class="changeTicket_inputBox">
                <input type="text" name="newTicketAgent" placeholder ="Insert the name of the agent you want to assign this to or leave empty to remove any assignment"></input>
            </div>
            <div class="changeTicket_inputBox">
                <button type="submit">Submit Change Assignment</button>
            </div>
        </form>

        <div class="changeTicket_inputBox">
            <p>Add Hashtag:</p>
        </div>
        <form action='../actions/add_hashtag_action.php' method="post" class="editTicketForm">
            <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
            <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
            <input class="changeTicket_inputBox" type="text" name="add_hashtag" id="add_hashtag" placeholder="#Add Hashtags" list="hashtag_list" autocomplete="on">
            <datalist id="hashtag_list">
                <?php foreach ($hashtags as $hashtag){ ?>
                    <option value="<?php echo $hashtag['name']; ?>"></option>
                <?php } ?>
            </datalist>
        </form>

    <?php } ?>



    <section id="singleTicket" class="activeTickets">
    </section>

    <form method="post" id="insertAnswer" action="../actions/add_ticket_answer_action.php">
        <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id">
        <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
        <textarea id="newAnswerText" name="newAnswerText" required></textarea>
        <button type="submit">Post</button>
    </form>
    <?php if($_SESSION["type"] !== 'Client'){?>
        <section class="faqAnswers">
            <form method="post" id="insertFaqAnswer" action="../actions/add_ticket_answer_action.php">
                <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id">
                <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                <select id="faqSelect" name="newAnswerText">
                    <?php
                        foreach($faq as $qa){
                            echo '<option value="' . $qa["answer"] . '">' . $qa["question"] . '</option>';
                        }
                    ?>
                </select>
                <button type="submit">Quick Answer</button>
            </form>
        </section>
    <?php } ?>   

    <section id="ticketAnswers" class ="activeTickets">
    </section>

    <script src="../scripts/ticket_page.js" defer></script>
    <script>const ticketId = <?php echo $ticketId ?>;</script>
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>
