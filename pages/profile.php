<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
?>

<body id="profile_body">
    <?php include_once ('../pages/default.php');?>
    <main class="profile_main">
        <section class="profileInfo">
            <h2>Profile Information</h2>
            <p>Username: <?php echo htmlspecialchars($_SESSION["username"]); ?></p>
            <p>Name: <?php echo htmlspecialchars($_SESSION["name"]); ?></p>
            <?php var_dump($_SESSION);?>
        </section>
    </main>
</body>

<?php
    include_once('../templates/footer.php');
?>