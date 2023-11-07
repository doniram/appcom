<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Testing Page</title>
</head>

    <div class="container">
    <?php include "template/header.php";?>
        <div class="loginpage">
            <div class="centered">
            <h3>Please Login</h3>
            <h3><?php if(isset($_SESSION['error'])) {echo $_SESSION["error"];} ?></h3>
                <form action="process.php" method="post">
                <div><input class="inplogin" placeholder="  username"  type="text" name="namaksr" required></div>
                    
                    <div><input class="inplogin" placeholder="  password"  type="password" name="password" id=""></div>
                    <div class="btnwrap"><button name="submit"class="btnstyle">Login</button>
                    </div>
                    <div><p>not have account? <a href="register.php">Register now</a> </p></div>
                </form>
            
                <div class="clearboth"></div>
            </div>
        </div>
    <?php include "template/footer.php";?>
</body>
</html>