<!DOCTYPE html>

<?php
    include_once('../utils/init.php');
    include_once('../templates/head.php');
    
?>
<body id="register_body">
    <main id="register_page">
        <section id="login_box">
            <form method="post" id="register_form">
                <input type="hidden" id = "csrf" name="csrf" value="<?=$_SESSION['csrf']?>"></input>
                <header>
                    <h3>Register</h3>
                </header>
                <div class="inputbox register_inputbox">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <p id="email_error" class="register_error"></p>
                </div>
                <div class="inputbox register_inputbox">
                    <input type="text" name="username" placeholder="Username" required>
                    <p id="username_error" class="register_error"></p>
                </div>
                <div class="inputbox register_inputbox">
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="inputbox register_inputbox">
                    <input type="password" name="password" placeholder="Password" required>
                    <p id="password_error" class="register_error"></p>
                </div>
                <div class="inputbox register_inputbox">
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                    <p id="confirm_password_error" class="register_error"></p>
                </div>
                <button type="submit" id="register_button">Register</button>
                <p>Already have an account? <a href="login.php">Login Here</a></p>
            </form>
        </section>
    </main>
    <script src="../scripts/register.js"></script>
</body>
<?php

    include('../templates/footer.php');

?>