<!DOCTYPE html>

<?php
    include_once('../utils/session.php');
    include_once('../database/connection.php');
    include_once('../templates/head.php');
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST['username']) || length($_POST['username'] > 20)){
            echo "Invalid username!\n";
        } else {
            $stmt = $dbh->prepare('INSERT INTO users (username,name,password,email,type) VALUES (?,?,?,?,?)');
            $stmt->execute(array($_POST["username"], $_POST["username"], hash($_POST["password"]), $_POST["email"], 'client'));

        }
    }
    
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
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="inputbox" id="register_inputbox">
                    <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <button id="register_button">Register</button>
                <p>Already have an account? <a href="login.php">Login Here</a></p>
            </form>
            <p> <?php echo htmlentities($error) ?> </p>
        </section>
    </main>
</body>
<?php

    include('../templates/footer.php');

?>