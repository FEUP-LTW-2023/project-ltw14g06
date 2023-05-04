<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    $user = getUserData($_SESSION['username']);
?>

<body id="profile_body">
    <?php include_once ('../templates/default.php');?>
    <main class="profile_main">
        <section class="profileInfo">
            <h2>Profile Information</h2>
            <p>Username: <?php echo htmlspecialchars($user["username"]); ?></p>
            <p>Name: <?php echo htmlspecialchars($user["name"]); ?></p>
            <p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>
            <p>Account Type: <?php echo htmlspecialchars($user["type"]); ?></p>
            <button class="edit_profile_button">
                Edit
            </button>
        </section>
        <form action="../actions/change_info_action.php" method="post" id="changeInfo_form">
            <section class="changeInfo">
                <h2>Change Info</h2>
                <div id="changeInfo_inputbox">
                    <input type="text" name="newEmail" placeholder="New E-mail">
                </div>
                <div id="changeInfo_inputbox">
                    <input type="text" name="newUsername" placeholder="New Username">
                </div>
                <div id="changeInfo_inputbox">
                    <input type="text" name="newName" placeholder="New Name">
                </div>
                <div id="changeInfo_inputbox">
                    <input type="password" name="newPassword" placeholder="New Password">
                </div>
                <div id="changeInfo_inputbox">
                    <input type="password" name="confirmNewPassword" placeholder="Confirm New Password">
                </div>
                <div id="changeInfo_inputbox">
                    <input type="password" name="oldPassword" placeholder="Old Password" required>
                </div>
                <button id="SubmitChange">Submit</button>
            </section>
        </form>
        
        
    </main>
</body>

<?php
    include_once('../templates/footer.php');
?>