<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <section id="search_menu">
        <div id="search_department">
        </div>
    </section>

    <h2 id="all_searched_tickets">Tickets:</h2><br>
    <section id="searched_tickets" class="tickets">
    </section>
    <script src="../scripts/search_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 