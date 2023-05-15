<!DOCTYPE html>
<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/faq_functions.php');

    $faq = getFAQ();
?>
<body id = "home_body">
    <?php include_once('../templates/default.php'); ?>
    <section id="manage_faq_box">
        <form action="../actions/faq_action.php" method="post" id="faqForm">
            <header>
                <h2>New Question</h2>
            </header>
            <div class = "textareaFAQdiv">
                <textarea class = "textareaFAQ" name="newFAQQuestion" placeholder="Insert a new question here" required></textarea>
            </div>
            <div class = "textareaFAQdiv">
                <textarea  class = "textareaFAQ" name="newFAQAnswer" placeholder="Insert the answer here" required></textarea>
            </div>
            <button id="submitNewFAQ" type="submit">Submit to FAQ</button>
        </form>
    </section>
    <section id="manageFAQ">
        <ul class="listFAQ">
            <?php
                foreach($faq as $qa){
                    echo '<li class="FAQitem">';
                    echo "<p class='faqManage'>" . $qa["question"] . '  ->  <br>' .  $qa["answer"] . '</p>';
                    echo '<button id="deleteFAQ" onclick="deleteFAQ(' . $qa["id"] . ')">Delete</button>';
                    //echo '<button onclick="editFAQ(' . $qa["id"] . ')">Edit</button>';
                    echo '</li>';
                }
            ?>
        </ul>
    </section>
    <script src="../scripts/manage_faq.js" defer></script>
</body>

<?php

    include_once('../templates/footer.php');
    
?>

