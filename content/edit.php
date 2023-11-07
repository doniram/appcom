<?php
 session_start();
 if (!isset($_SESSION["id"])) {
     $_SESSION["error"] = "SILAHKAN LOGIN TERLEBIH DAHULU !!";
     header("Location: ../index.php");
 }
 
include "../koneksi.php";
$con = new koneksi();
$id = $_GET['id'];
$data = $con->selectanggotabyid($id);
$row = $data->fetch_assoc();


if (isset($_POST['submit'])) {
    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $wajib = $_POST['wajib'];
    $pokok = $_POST['pokok'];
    $saldo = $_POST['saldo'];
    $data = $con->edit_anggota($no_anggota, $nama, $wajib, $pokok, $saldo);
    if($data > 0 ){
        echo "<script> alert('Data Berhasil diedit');
        document.location.href = '../content/viewdata.php'</script>";
    }else{
        echo "<script> alert('Data Gagal diedit')</script>";
    }
}
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
                <h3>Edit Data</h3><hr>

                <form action="" method="post">
                <table>
                <tr>
                <td><label for="no">No Anggota</label></td>
                <td>:</td>
                <td><input value=<?=$row["no_anggota"] ?> class="inplogin" type="text" name="no_anggota" id="no" required></td>
                </tr>                    
                <tr>
                <td><label for="Nama">Nama</label></td>
                <td>:</td>
                <td><input value=<?=$row["nama"] ?> class="inplogin" type="text" name="nama" id="Nama" required></td>
                </tr>
               
                <tr>
                <td><label for="simpanan">Simpanan Wajib</label></td>
                <td>:</td>
                <td><input value=<?=$row["wajib"] ?> class="inplogin" type="text" name="wajib" id="simpanan" required></td>
                </tr>
                <tr>
                <td><label for="pokok">pokok</label></td>
                <td>:</td>
                <td><input value=<?=$row["pokok"] ?> class="inplogin" type="text" name="pokok" id="pokok" required></td>
                </tr>
                <td><label for="saldo">Saldo</label></td>
                <td>:</td>
                <td><input value=<?=$row["saldo"] ?> class="inplogin" type="text" name="saldo" id="saldo" required></td>
                </tr>
                      
                </table> 
                <div class="btnpos">
                    <a href="/viewdata.php"><button class="btnstyle">Kembali</button></a>
                    <button class="btnstyle" type="submit" name="submit" value="">Edit Data</button>
                </div>
                </form>  
                <div class="clearboth"></div>
            </div>
        </div>
    <?php include "../template/footer.php";?>
</body>
</html>