<!DOCTYPE html>

<?php

    include('../templates/header.php');

?>

    <main id= "login_page">
        <section id="login_box">
            <form action="login.php" method="post">
                <header>
                    <h3>Login</h3>
                </header>
                <div class="inputbox">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button>Log In</button>
                <p>Don't have an account? <a href="register.html">Register Here</a></p>
            </form>
        </section>
    </main>

<?php

    include('../templates/footer.php');
    
?>