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
    <section id="faq_sec">
        <ul class=question_list>
            <?php
                foreach($faq as $qa){
                    echo '<li class="questionAnswer">';
                    echo "<h2 id='faqQuestion'>" . $qa["question"] . '</h2>';
                    echo "<p id='faqAnswer'>" . $qa["answer"] . '</p>';
                    if($_SESSION["type"] !== 'Client'){
                        echo '<button id="deleteFAQ" onclick="deleteFAQ(' . $qa["id"] . ')">Delete</button>';
                    }
                    echo '</li>';
                }
            ?>
        </ul>
    </section>
    <script src="../scripts/faq.js" defer></script>
</body>


<?php

    include_once('../templates/footer.php');
    
?>