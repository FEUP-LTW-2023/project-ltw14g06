<!DOCTYPE html>

<?php

    include('../templates/header.php');

?>

    <main id= "register_page">
        <section id="login_box">
            <form action="login.php" method="post">
                <header>
                    <h3>Register</h3>
                </header>
                <div class="inputbox">
                    <input type="text" name="username" placeholder="E-mail" required>
                </div>
                <div class="inputbox">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" placeholder="Confirm Password" required>
                </div>
                <button>Register</button>
                <p>Already have an account? <a href="login.html">Login Here</a></p>
            </form>
        </section>
    </main>
<?php

    include('../templates/footer.php');

?>