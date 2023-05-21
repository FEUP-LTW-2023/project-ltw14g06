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
                foreach ($faq as $qa) {
                    echo '<li class="questionAnswer">';
                    echo "<h2 id='faqQuestion" . $qa["id"] . "' data-id='" . $qa["id"] . "'>" . html_entity_decode($qa["question"]) . '</h2>';
                    echo "<p id='faqAnswer" . $qa["id"] . "' data-id='" . $qa["id"] . "'>" . html_entity_decode($qa["answer"]) . '</p>';
                    if ($_SESSION["type"] !== 'Client') {
                        echo '<div class="buttonContainer">';
                        //echo '<button class="deleteFAQ" onclick="deleteFAQ(' . $qa["id"] . ')">Delete</button>';
                        echo '<button id="delete_FAQ_button" class="deleteFAQ" data-qa-id="' . $qa["id"] . '">Delete</button>';
                        echo '<button id="edit_FAQ_button" class="deleteFAQ" data-qa-id="' . $qa["id"] . '">Edit</button>';
                        //echo '<button id="edit_FAQ_button' . $qa["id"] . '" class="deleteFAQ" onclick="toggleTextarea(' . $qa["id"] . ')">Edit</button>';
                        echo '</div>';
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