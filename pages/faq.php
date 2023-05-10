<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/faq_functions.php');

    $faq = getFAQ();
?>
<body id=faq_body>
    <?php include_once ('../templates/default.php');?>
   <h1>Frequently asked questions</h1>
    <ul class=question_list>
        <?php
            foreach($faq as $qa){
                echo '<li>';
                echo "<h2 id='faqQuestion'>" . $qa["question"] . '</h2>';
                echo "<p id='faqAnswer'>" . $qa["answer"] . '</p>';
                echo '</li>';
            }
        ?>
    </ul>
    
</body>


<?php

    include_once('../templates/footer.php');
    
?>