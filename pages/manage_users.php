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
        <form method="post" class = "searchUserForm">
            <div class="inputbox" id="search_user">
                <input type="input" name="username" placeholder ="Search User" required></input>
            </div>
        </form>
    </div>

    <?php if($showProfile){ ?>
        <section class="profile_info_sec">
        </section>
    <?php } ?>
    
    <script src="../scripts/manage_users.js" defer></script>
    <?php
    if(isset($_POST["username"])){ 
        if(usernameIsRegistered($_POST["username"])){ ?>
            <script>const username_ = <?php echo json_encode($_POST["username"]); ?>;</script>
            <script>const user_id_ = <?php echo json_encode($user["id"]); ?>;</script>
        <?php }
    } ?>

    
</body>
<?php

    include_once('../templates/footer.php');
    
?>

 