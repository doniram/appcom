<?php
 session_start();
 if (!isset($_SESSION["id"])) {
     $_SESSION["error"] = "SILAHKAN LOGIN TERLEBIH DAHULU !!";
     header("Location: ../index.php");
 }
 
include "../koneksi.php";
$con = new koneksi();
if (isset($_POST['submit'])) {
    $no_anggota = $_POST['no_anggota'];
    $nama = $_POST['nama'];
    $wajib = $_POST['wajib'];
    $pokok = $_POST['pokok'];
    $saldo = $_POST['saldo'];
    $data = $con->tambah_anggota($no_anggota, $nama, $wajib, $pokok, $saldo);
    if ($data >0 ){
        echo "<script> alert('Data Berhasil ditambahkan');
        document.location.href = '../content/viewdata.php'</script>";
    }else{
        echo "<script> alert('Data Gagal ditambahkan')</script>";
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
                <h3>Tambah Data</h3><hr>

                <form action="" method="post">
              
    <div> 
    No Anggota </div>
        <input class="inplogin" type="text" name="no_anggota" id="no" required>
   
       
    <div> Nama  </div>
        <input class="inplogin" type="text" name="nama" id="Nama" required>

  
    
     
    
    <div>  Simpanan Wajib</div>
      
        <input class="inplogin" type="text" name="wajib" id="simpanan" required>
    
    <div>Pokok</div>
        
        <input class="inplogin" type="text" name="pokok" id="pokok" required>
    
    
        <div>Saldo</div>
        <input class="inplogin" type="text" name="saldo" id="saldo" required>

                <div class="btnpos">
                    <button class="btnstyle" type="reset">Hapus</button>
                    <button class="btnstyle" type="submit" name="submit" value="">Tambah</button>
                </div>
                </form>  
                <div class="clearboth"></div>
            </div>
        </div>
    <?php include "../template/footer.php";?>
</body>
</html>