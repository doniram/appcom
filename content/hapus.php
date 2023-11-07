<?php
 session_start();
 if (!isset($_SESSION["id"])) {
     $_SESSION["error"] = "SILAHKAN LOGIN TERLEBIH DAHULU !!";
     header("Location: ../index.php");
 }

include "../koneksi.php";

$con = new koneksi();
$id = $_GET['id'];
$data = $con->hapus_anggota($id);

if($data > 0){
    echo "<script>alert('Data Berhasil dihapus');
    document.location.href = '../content/viewdata.php' </script>";
}else{
    echo "hapus gagal";
}