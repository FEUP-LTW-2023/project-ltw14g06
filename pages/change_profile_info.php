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
        <form action="../actions/change_info_action.php" method="post" id="change_info_form">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
            <header>
                <h2>Change Info</h2>
            </header>
            <div class="inputbox">
                <input type="text" name="newEmail" placeholder="New E-mail">
            </div>
            <div class="inputbox">
                <input type="text" name="newUsername" placeholder="New Username">
            </div>
            <div class="inputbox">
                <input type="text" name="newName" placeholder="New Name">
            </div>
            <div class="inputbox">
                <input type="password" name="newPassword" placeholder="New Password">
            </div>
            <div class="inputbox">
                <input type="password" name="confirmNewPassword" placeholder="Confirm New Password">
            </div>
            <div class="inputbox">
                <input type="password" name="oldPassword" placeholder="Old Password" required>
            </div>
            <button id="change_button">Submit</button>
        </form>
    </section>
</body>

<?php
    include_once('../templates/footer.php');
?>