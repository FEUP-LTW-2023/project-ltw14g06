<!DOCTYPE html>
<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
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
</body>

<?php

    include_once('../templates/footer.php');
    
?>

