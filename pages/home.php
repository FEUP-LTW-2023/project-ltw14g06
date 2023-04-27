<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');

?>
<body id=home_body>
    <header class="page_header">
        This is a test
    </header>
    <div class="sidebar close">
        <div class="sidebarDetails">
            <i class='bx bxs-notepad'></i>
            <span class="websiteName">Lippu</span>
        </div>
        <ul class="sidebarAllButtons">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="sidebarButtonName">Home</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="#">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="sidebarButton">
                    <a href="#">
                        <i class='bx bx-collection' ></i>
                        <span class="sidebarButtonName">My Tickets</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="subMenu">
                    <li><a class="sidebarButtonName" href="#">My Tickets</a></li>
                    <li><a href="#">Active Tickets</a></li>
                    <li><a href="#">Closed Tickets</a></li>
                    <li><a href="#">All Tickets</a></li>
                </ul>
            </li>
            <li class = "AgentMenu">
                <div class="sidebarButton">
                    <a href="#">
                        <i class='bx bxs-user-badge'></i>
                        <span class="sidebarButtonName">Agent Menu</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="subMenu">
                    <li><a class="sidebarButtonName" href="#">Agent Menu</a></li>
                    <li><a href="#">Assigned Tickets</a></li>
                    <li><a href="#">Active Department Tickets</a></li>
                    <li><a href="#">All Active Tickets</a></li>
                    <li><a href="#">Manage FAQ</a></li>

                </ul>
            </li>
            <li class="AdminMenu">
                <div class="sidebarButton">
                    <a href="#">
                        <i class='bx bx-id-card'></i>
                        <span class="sidebarButtonName">Admin Menu</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="subMenu">
                    <li><a class="sidebarButtonName" href="#">Admin Menu</a></li>
                    <li><a href="#">Manage Users</a></li>
                    <li><a href="#">Manage Website</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-question-mark' ></i>
                    <span class="sidebarButtonName">F.A.Q.</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="#">F.A.Q.</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-user'></i>
                    <span class="sidebarButtonName">Profile</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="#">Profile</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="sidebarButtonName">Settings</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="#">Settings</a></li>
                </ul>
            </li>
            <li>
                <a href="../utils/end_session.php">
                    <i class='bx bx-log-out'></i>
                    <span class="sidebarButtonName">Log out</span>
                </a>
                <ul class="subMenu none">
                    <li><a class="sidebarButtonName" href="#">Log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="mainSection">
        <div class="hamburguerMenu">
            <i class='bx bx-menu' ></i>
        </div>
    </section>
    <script src="../scripts/sidebar.js"></script>
</body>
<?php

    include('../templates/footer.php');
    
?>