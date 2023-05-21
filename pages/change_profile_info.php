<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    $user = getUserData($_SESSION['username']);
?>

<body id="profile_body">
    <?php include_once ('../templates/default.php');?>
    <section id="change_profile_info" class="profile_info_sec">
        <form method="post" id="change_info_form">
            <input type="hidden" id = "csrf" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
            <header>
                <h2>Change Info</h2>
            </header>
            <div class="inputbox">
                <input type="text" name="email" placeholder="New E-mail">
                <p id="email_error" class="register_error"></p>
            </div>
            <div class="inputbox">
                <input type="text" name="username" placeholder="New Username">
                <p id="username_error" class="register_error"></p>
            </div>
            <div class="inputbox">
                <input type="text" name="name" placeholder="New Name">
            </div>
            <div class="inputbox">
                <input type="password" name="password" placeholder="New Password">
                <p id="password_error" class="register_error"></p>
            </div>
            <div class="inputbox">
                <input type="password" name="confirmPassword" placeholder="Confirm New Password">
                <p id="confirm_password_error" class="register_error"></p>
            </div>
            <div class="inputbox">
                <input type="password" name="oldPassword" placeholder="Old Password" required>
                <p id = "old_password_error" class="register_error"></p>
            </div>
            <button id="change_button">Submit</button>
        </form>
    </section>
    <script src="../scripts/change_profile_info.js"></script>
</body>

<?php
    include_once('../templates/footer.php');
?>