<!DOCTYPE html>

<?php

    include('../templates/head.php');

?>
<body id=main_body>
    <nav id="main_navigation_bar">
        
    </nav>
    <div class="sidebar close">
        <div class="logo-details">
            <i class='bx bxs-notepad'></i>
            <span class="logo_name">Lippu</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-collection' ></i>
                        <span class="link_name">My Tickets</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">My Tickets</a></li>
                    <li><a href="#">Active Tickets</a></li>
                    <li><a href="#">Closed Tickets</a></li>
                    <li><a href="#">All Tickets</a></li>
                </ul>
            </li>
            <li class = "Agent-menu">
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bxs-user-badge'></i>
                        <span class="link_name">Agent Menu</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Agent Menu</a></li>
                    <li><a href="#">Assigned Tickets</a></li>
                    <li><a href="#">Active Department Tickets</a></li>
                    <li><a href="#">All Active Tickets</a></li>
                    <li><a href="#">Manage FAQ</a></li>

                </ul>
            </li>
            <li class="Admin-menu">
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-id-card'></i>
                        <span class="link_name">Admin Menu</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow' ></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Admin Menu</a></li>
                    <li><a href="#">Manage Users</a></li>
                    <li><a href="#">Manage Website</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-question-mark' ></i>
                    <span class="link_name">F.A.Q.</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">F.A.Q.</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-user'></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Profile</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog' ></i>
                    <span class="link_name">Settings</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Settings</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu' ></i>
        </div>
    </section>
    <script src="../scripts/sidebar.js"></script>
</body>
<?php

    include('../templates/footer.php');
    
?>