<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $admin = getUserDataByID($_SESSION["id"]);
    $showProfile = false;
    if(usernameIsRegistered($_POST["username"])){
        $user = getUserData($_POST["username"]);
        $showProfile = true;
    }
?>

<body id=home_body>
    <?php include_once ('../templates/default.php');?>

    <div class="searchUser">
        <p>Choose an User:</p>
    </div>
    <form method="post" class = "searchUserForm">
        <div class="manageUsers_inputBox">
            <input type="input" name="username" placeholder ="Insert an username"></input>
        </div>
        <div class="manageUsers_inputBox">
            <button type="submit">Searchaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</button>
        </div>
    </form>

    <?php if($showProfile){ ?>
        <section class="profile_info_sec">
            <header>
                <h2><?php echo $user["username"];?>'s profile information</h2>
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
        </section>
    <?php } ?>
    
    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 