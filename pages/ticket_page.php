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
        <section id="ticket_page_section">

            <a href="../pages/ticket_changelog.php?id=<?php echo $ticketId; ?>" id = "ticket_changelog">Ticket History</a>
            
            <section id="edit_ticket_section">

                <form action="../actions/change_ticket_department_action.php" class="editTicketForm" method="post">
                    <input id="csrf"type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                    <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
                    <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                    <input type="hidden" value = "<?php echo getDepartmentName($ticket['department_id']) ?>" name = "old_department">
                    <select name="ticket_department" id="change_ticket_department" class="editTicketInputbox">
                        <?php
                            foreach ($departments as $department) {
                                if($department["id"] === $ticket["department_id"]) continue;
                                echo '<option value="' . $department["id"] . '">' . $department["name"] . '</option>';
                            }
                        ?>
                    </select>   
                    <button class = "changeTicketInfoButton" id="change_ticket_department_button" type="submit">Submit Change Department</button>
                </form>
        
                <form action="../actions/change_ticket_priority_action.php" class="editTicketForm" method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                    <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
                    <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                    <input type="hidden" value = "<?php echo $ticket['priority_id'] ?>" name = "old_priority">
                    <select name="ticket_priority" id="change_ticket_priority" class="editTicketInputbox">
                        <?php if($ticket["priority_id"]!==1){?>
                            <option value="1">Low</option>
                        <?php } if($ticket["priority_id"]!==2){?>
                            <option value="2">Medium</option>
                        <?php }if($ticket["priority_id"]!==3){ ?>
                            <option value="3">High</option>
                        <?php } ?>
                    </select>   
                    <button class = "changeTicketInfoButton" id="change_ticket_priority_button" type="submit">Submit Change Priority</button>
                </form>
        
                <form action="../actions/change_ticket_status_action.php" class="editTicketForm" method="post">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                    <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
                    <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                    <input type="hidden" value = "<?php echo $ticket['agent_id'] ?>" name = "old_agent">
                    <input type="hidden" value = "<?php echo getStatusName($ticket['status_id']) ?>" name = "old_status">
                    <select name="ticket_status" id="ticket_status" class="editTicketInputbox">
                            <?php
                                foreach ($status as $singleStatus) {
                                    if($singleStatus["id"] === $ticket["status_id"]) continue;
                                    if($ticket["agent_id"] === 0 and $singleStatus["id"]===3) continue;
                                    echo '<option value="' . $singleStatus["id"] . '">' . $singleStatus["name"] . '</option>';
                                }
                            ?>
                    </select>    
                    <button class = "changeTicketInfoButton" type="submit">Submit Change Status</button>
                </form>
        
                <form action='../actions/change_ticket_assignment_action.php' method="post" class="editTicketForm">
                    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                    <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
                    <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                    <input type="hidden" value = "<?php echo $ticket['agent_id'] ?>" name = "old_agent">
                    <input type="hidden" value = "<?php echo getStatusName($ticket['status_id']) ?>" name = "old_status">
                    <input type="text" name="newTicketAgent" placeholder ="Name of agent to be assigned"  class="editTicketInputbox"></input>
                    <button class = "changeTicketInfoButton" type="submit">Submit Change Assignment</button>
                </form>
        
                <form action='../actions/add_hashtag_action.php' method="post" class="editTicketForm">
                    <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id"></input>
                    <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                    <input class="editTicketInputbox" type="text" name="add_hashtag" id="add_hashtag" placeholder="#Add Hashtags" list="hashtag_list" autocomplete="on">
                    <datalist id="hashtag_list">
                        <?php foreach ($hashtags as $hashtag){ ?>
                            <option value="<?php echo $hashtag['name']; ?>"></option>
                        <?php } ?>
                    </datalist>
                </form>
            </section>
    
        <?php } ?>
    
    
    
        <section id="singleTicket" class="activeTickets">
        </section>
    
        
        <section id="ticketAnswers" class ="activeTickets">
        </section>
            <form method="post" id="insertAnswer" action="../actions/add_ticket_answer_action.php">
                <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                <input type="hidden" value = "<?php echo $ticketId ?>" name = "ticket_id">
                <input type="hidden" value = "<?php echo $_SESSION['id'] ?>" name = "user_id">
                <textarea id="newAnswerText" name="newAnswerText" required></textarea>
                <button type="submit">Post</button>
            </form>
            <?php if($_SESSION["type"] !== 'Client'){?>
                <section class="faqAnswers">
                    <form method="post" id="insertFaqAnswer" action="../actions/add_ticket_answer_action.php">
                        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
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
    </section>

    <script src="../scripts/ticket_page.js" defer></script>
    <script>const ticketId = <?php echo $ticketId ?>;</script>
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>
