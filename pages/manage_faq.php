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
    <form action="../actions/faq_action.php" method="post" id="faqForm">
        <textarea id="newFAQQuestion" name="newFAQQuestion" placeholder="Insert a new question here" required></textarea>
        <textarea id="newFAQAnswer" name="newFAQAnswer" placeholder="Insert the answer here" required></textarea>
        <button type="submit">Submit to FAQ</button>
    </form>
    <section id="manageFAQ">
        <?php
            foreach($faq as $qa){
                echo '<li>';
                echo "<p id='faqManage'>" . $qa["question"] . '  ->  ' .  $qa["answer"] . '</p>';
                echo '<button onclick="deleteFAQ(' . $qa["id"] . ')">Delete</button>';
                //echo '<button onclick="editFAQ(' . $qa["id"] . ')">Edit</button>';
                echo '</li>';
            }
        ?>
    </section>
    <script src="../scripts/manage_faq.js" defer></script>
</body>

<?php

    include_once('../templates/footer.php');
    
?>

