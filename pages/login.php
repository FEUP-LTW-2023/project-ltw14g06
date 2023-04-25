<!DOCTYPE html>

<?php
    session_start();
    include('../templates/head.php');
    if (isset($_GET["login"])){
        class MyDB extends SQLite3 {
            function __construct(){
                $this->open('database/db.db');
            }
        }
        $db = new MyDB();
        if(!$db){
            echo $db->lastErrorMsg();
        } else {
            echo "Opened database successfully\n";
        }

        $userData ='SELECT * from users where username="'.$_POST["username"].'";';
        
        $ret = $db->query($userData);

        
        while($row = $ret->fetchArray(SQLITE3_ASSOC)){
            $id = $row['id'];
            $username = $row['username'];
            $password=$row['password'];
        }
        if($id!=""){
            if($password!=$_POST["password"]){
                $_SESSION["login"]=$username;
                header('Location: pages/main.php');
            }else{
                echo "wrong password";
            }
        }else{
            echo "user not found";
        }
        
        $db->close();
    }
?>
<body id=login_body>
    <main id= "login_page">
        <section id="login_box">
            <form action="login.php?login=true" method="post" id="login_form">
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