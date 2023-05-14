<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    include_once('../database/user.php');
    include_once('../database/ticket.php');

    $admin = getUserDataByID($_SESSION["id"]);
    $showProfile = false;
    if(isset($_POST["username"])){
        if(usernameIsRegistered($_POST["username"])){
            $user = getUserData($_POST["username"]);
            $showProfile = true;
        }
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
        </section>
        <div id="PromoteAndDemote">
        </div>
    <?php } ?>
    
    <script src="../scripts/manage_users.js" defer></script>
    <?php
    if(isset($_POST["username"])){ 
        if(usernameIsRegistered($_POST["username"])){ ?>
            <script>const username_ = <?php echo json_encode($_POST["username"]); ?>;</script>
        <?php }
    } ?>

    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 