<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    getUserData($_SESSION["username"]);
?>

<body id="profile_body">
    <?php include_once ('../pages/default.php');?>
    <main class="profile_main">
        <section class="profileInfo">
            <h2>Profile Information</h2>
            <p>Username: <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
            <p>Name: <?php echo htmlspecialchars($_SESSION["name"]); ?></p>
            <p>Email: <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
            <p>Account Type: <?php echo htmlspecialchars($_SESSION["type"]); ?></p>
            <button class="edit_profile_button">
                Edit
            </button>
        </section>
        <form action="../actions/changeInfo_action.php" method="post" id="changeInfo_form">
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