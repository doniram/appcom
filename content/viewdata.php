<?php
 session_start();
 if (!isset($_SESSION["id"])) {
     $_SESSION["error"] = "SILAHKAN LOGIN TERLEBIH DAHULU !!";
     header("Location: ../index.php");
 }

 include "../koneksi.php";


$con = new koneksi();
$no = 1;
$data = $con->get_data_anggota();

if (isset ($_POST["cari"])){

    $data =$con->cari_data($_POST["keyword"]);
}

?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/style.css" rel="stylesheet">
    <title>App CRUD</title>
</head>
<body>
    <div class="container">
    <?php include "../template/header.php";?>
        <?php include "../template/menu.php";?>
        <form action="" method="post">
            <input class="searchbar" type="text" placeholder="  Cari Data..." name="keyword" autofocus="on" autocomplete="off" id="">
            <button name="cari" class="btnstyle">Cari</button>
            </form>
        <div class="content">
            <div class="bungkus">
            <div style="overflow-x:auto;">
            <table id="tabledata" style="border:1px solid #ccc;padding:2px;">
            <tr>
          
            <th>Nomor Anggota</th>
            <th>nama</th>
            <th>wajib</th>
            <th>pokok</th>
            <th>saldo</th>
            <th>AKSI</th>
            </tr>
            
            <?php while ($row = $data->fetch_array()):?>
            <tr>
           
            <td><?= $row['no_anggota'];?></td>
            <td><?= $row['nama'];?></td>
            <td><?= $row['wajib'];?></td>
            <td><?= $row['pokok'];?></td>
            <td><?= $row['saldo'];?></td>
            <td cellpadding="6"><button class="btn-act" ><a href="../content/edit.php?id=<?= $row['no_anggota']; ?>" >Edit </a></button>  |
            <button  class="btn-act" > <a href="../content/hapus.php?id=<?= $row['no_anggota']; ?>" onclick="return confirm('Apakah Anda yakin ingin melanjutkan?')"> Hapus</a> </button></td>
            </tr>
            
            <?php endwhile ;?>
            </table>
            </div>
            </div>
        </div>
    <?php include "../template/footer.php";?>
</body>
</html>