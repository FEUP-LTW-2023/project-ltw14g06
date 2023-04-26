<!DOCTYPE html>

<?php
    include_once('../templates/head.php');
    
?>
<body id=register_body>
    <main id= "register_page">
        <section id="login_box">
            <form action="../actions/register_action.php" method="post" id="register_form">
                <header>
                    <h3>Register</h3>
                </header>
                <div class="inputbox" id="register_inputbox">
                    <input type="text" name="email" placeholder="E-mail" required>
                </div>
                <div class="inputbox" id="register_inputbox">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputbox" id="register_inputbox">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="inputbox" id="register_inputbox">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputbox" id="register_inputbox">
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <button id="register_button">Register</button>
                <p>Already have an account? <a href="login.php">Login Here</a></p>
            </form>
            <p> <?php if(isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']); unset($_SESSION['ERROR']) ?> </p>
        </section>
    </main>
</body>
<?php

    include('../templates/footer.php');

?>