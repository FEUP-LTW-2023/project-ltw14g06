<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <section id="search_menu">
        <select name="search_deparment_select" id="search_deparment_select"></select>
        <select name="search_status_select" id="search_status_select"></select>
        <select name="search_priority_select" id="search_priority_select">
            <option value = ""></option>
            <option value="Low">Low</option>
            <option value="Medum">Medium</option>
            <option value="High">High</option>
        </select>
        Assigned to: <input type="text" name="agent_name" id="agent_name">
        Posted By: <input type="text" name="user_username" id="user_username">
        From: <input type="date" name="from_created_at" id="from_created_at">
        Until: <input type="date" name="until_created_at" id="until_created_at">
        <select name="search_hashtag_select" id="search_hashtag_select"></select>
        <button id = "search_reset" type="submit">Reset</button>
    </section>

    <div id="show_search_hashtags">
    </div>

    <h2 id="all_searched_tickets">Tickets:</h2><br>
    <section id="searched_tickets" class="tickets"></section>
    <script src="../scripts/search_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 