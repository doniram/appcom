<?php

include "koneksi.php";
$con = new koneksi();

$username = $_POST['namaksr'];
$password = $_POST['password'];
$data = $con->login($username);
$isi = $data->fetch_assoc();



if ($isi != null) { // Periksa apakah data ditemukan
    if ($password == $isi["password"]) {
        session_start();
        $_SESSION["id"] = $isi["kodeksr"];
        $_SESSION["username"] = $isi["namaksr"];
        $_SESSION["nama"] = $isi["alias"];
        $_SESSION["alamat"] = $isi["alamat"];
        header("Location: content/viewdata.php");
    } else {
        session_start();
        $_SESSION["error"] = " Password Salah !!";
        header("Location: index.php");
    }
} else {
    session_start();
    $_SESSION["error"] = "Username Salah !!";
    header("Location: index.php");
}

// if ($isi > 0) {
//     if ($password == $isi["password"]) {
//         session_start();
//         $_SESSION["id"] = $isi["kodeksr"];
//         header("Location: content/viewdata.php");
//     } else {
//         $_SESSION["error"] = " Password Salah !!";
//         header("Location: index.php");
//     }
// }else if($username !== $isi["namaksr"]) {
//     $_SESSION["error"] = "username Salah !!";
//     header("Location : /index.php");
   
// }