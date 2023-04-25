<!DOCTYPE html>

<?php
    session_start();
    include('../templates/head.php');

    if (isset($_GET["add"])){
        if($error!=1){
            class MyDB extends SQLite3{
                function __construct(){
                $this->open('database.db');
                }
            }
            $db = new MyDB();
            if(!$db){
                echo $db->lastErrorMsg();
            } else {
                echo "Opened database successfully\n";
            }

            $sql = "INSERT INTO users (id,username,username)";

        }
    }

?>
<body id=register_body>
    <main id= "register_page">
        <section id="login_box">
            <form action="register.php?add<?php echo uniqid()?>" method="post" id="register_form">
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
        </section>
    </main>
</body>
<?php

    include('../templates/footer.php');

?>