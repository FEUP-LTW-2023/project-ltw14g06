<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    $user = getUserData($_SESSION['username']);
?>

<body id="profile_body">
    <?php include_once ('../templates/default.php');?>
    <section class="profile_info_sec">
        <header>
            <h2>Profile Information</h2>
        </header>
        <div class="profile_info_div">
            <p class="profile_info_title">Username:</p>
            <p><?php echo htmlspecialchars($user["username"]); ?></p>
        </div>
        <div class="profile_info_div">
            <p class="profile_info_title">Name:</p>
            <p><?php echo htmlspecialchars($user["name"]); ?></p>
        </div>
        <div class="profile_info_div">
            <p class="profile_info_title">Email:</p>
            <p><?php echo htmlspecialchars($user["email"]); ?></p>
        </div>
        <div class="profile_info_div">
            <p class="profile_info_title">Account Type:</p>
            <p> <?php echo htmlspecialchars($user["type"]); ?></p>
        </div>
        <p id="change_info_link"> Want to change your information? <a href="change_profile_info.php">Click Here</a></p>
    </section>
</body>

<?php
    include_once('../templates/footer.php');
?>