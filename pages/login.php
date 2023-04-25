<!DOCTYPE html>

<?php

    include('../templates/head.php');

?>
<body id=login_body>
    <main id= "login_page">
        <section id="login_box">
            <form action="../actions/login_action.php" method="post" id="login_form">
                <header>
                    <h3>Login</h3>
                </header>
                <div class="inputbox" id="login_inputbox">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputbox" id="login_inputbox">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button id="login_button">Log In</button>
                <p>Don't have an account? <a href="register.php">Register Here</a></p>
            </form>
        </section>
    </main>
</body>
<?php

    include('../templates/footer.php');
    
?>