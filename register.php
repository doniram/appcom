<?php
include "koneksi.php";
$con = new koneksi();
if(isset($_POST['register'])){
    $kdksr = $_POST["kdksr"];
    $nmksr =$_POST["nmksr"];
    $alias =$_POST["alias"];
    $alamat =$_POST["alamat"];
    $password =$_POST["password"];
    $data =$con->Register($kdksr, $nmksr, $alias, $alamat, $password);
    if ($data >0 ){
        echo "<script> alert('Registrasi Berhasil');
        document.location.href = 'index.php'</script>";
    }else{
        echo "<script> alert('Registrasi Gagal')</script>";
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Testing Page</title>
</head>
<body>
    <div class="container">
    <?php include "template/header.php";?>
        <div class="loginpage">
            <div class="centered">
            <h3>Register</h3>
                <form action="" method="post">
                    <div><input class="inplogin" placeholder="  kode ksr"  type="number" name="kdksr" required></div>
                    <div><input class="inplogin" placeholder="  username" type="text" name="nmksr"></div>
                    <div><input class="inplogin" placeholder="  nama"  type="text" name="alias" id=""></div>
                    <div><input class="inplogin" placeholder="  Alamat"  type="text" name="alamat" required></div>
                    <div><input class="inplogin" placeholder="  password" type="password" name="password"></div>
                    
                    <div class="btnwrap">
                        
                        <button class="btnstyle" name="register">Register</button>

                    </div>
                    <div><p>have account ? <a href="index.php">Login now!</a></p></div>
                </form>
                <div class="clearboth"></div>
            </div>
        </div>
    <?php include "template/footer.php";?>
</body>
</html>