<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>
<body id=faq_body>
    <?php include_once ('../templates/default.php');?>
    <h1>Frequently asked questions</h1>
    <div id="faq_sec">
        <input type="hidden" id= "csrf" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
        <input type="hidden" id= "user_type" name="user_type" value="<?=$_SESSION['type']?>"></input>
        <ul class=question_list>
        </ul>
</div>
    <script src="../scripts/faq.js" defer></script>
</body>


<?php

    include_once('../templates/footer.php');
    
?>