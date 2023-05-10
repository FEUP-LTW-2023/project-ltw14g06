<!DOCTYPE html>
<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
?>
<body id = "home_body">
    <?php include_once('../templates/default.php'); ?>
    <form action="../actions/faq_action.php" method="post" id="faqForm">
        <textarea id="newFAQQuestion" name="newFAQQuestion" placeholder="Insert a new question here" required></textarea>
        <textarea id="newFAQAnswer" name="newFAQAnswer" placeholder="Insert the answer here" required></textarea>
        <button type="submit">Submit to FAQ</button>
    </form>
</body>

<?php

    include_once('../templates/footer.php');
    
?>

