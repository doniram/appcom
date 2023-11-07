<?php
 session_start();
 if (!isset($_SESSION["id"])) {
     $_SESSION["error"] = "SILAHKAN LOGIN TERLEBIH DAHULU !!";
     header("Location: ../index.php");
 }
 
include "../koneksi.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <title>Testing Page</title>
</head>
<body>

    <div class="container">
    <?php include "../template/header.php";?>
        <?php include "../template/menu.php";?>
        <div class="content">
            <div class="loginwrapper">
                <h3>Profile</h3><hr>
                <table>
                <tr>
                <td><label for="no">Username</label></td>
                <td>:</td>
                <td><?= $_SESSION["username"]?></td>
                </tr>
                <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><?= $_SESSION["nama"]?></td></td>
                </tr>                    
                <tr>
                <td><label for="Alamat">Alamat</label></td>
                <td>:</td>
                <td><?= $_SESSION["alamat"]?></td></td>
                </tr>
               </table>
               <button name="submit"class="btnstyle"><a href="../logout.php" style="text-decoration: none;color: white;">Logout</a></button>
                <div class="clearboth"></div>
            </div>
        </div>
    <?php include "../template/footer.php";?>
</body>
</html>