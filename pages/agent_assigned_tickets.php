<!DOCTYPE html>

<?php
    include_once('../utils/kick_from_page.php');
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <form class="sortTickets" id="sort_tickets_form">
        <label for="order">Order by:</label>
        <select name="order" id="order">
            <option value="id">Most Recent</option>
            <option value="status_id">Status</option>
            <option value="department_id">Department</option>
            <option value="priority">Priority</option>
            <option value="hashtag">Hashtag</option>
        </select>

        <label for="sort">Sorting order:</label>
        <select name="sort" id="sort">
            <option value="desc">Descending</option>
            <option value="asc">Ascending</option>
        </select>

        <button type="submit">Sort</button>
    </form>

    <h2 id="agent_assigned_tickets">All Assigned Tickets:</h2><br>
    <section id="assigned_tickets" class="tickets">
    </section>
    <script src="../scripts/get_tickets.js" defer></script>
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 