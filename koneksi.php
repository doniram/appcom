<?php
class koneksi
{
    private $koneksi;

    
    function __construct()
    {
        $this->koneksi = new mysqli("localhost", "root", "", "crudapp");
    }
    function login($a)
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_kasir WHERE namaksr = '$a'");
        return $data;
    }
    // Anggota
    function get_data_anggota()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_anggota ORDER BY no_anggota ASC");
        return $data;
    }
    function tambah_anggota($a, $b, $c, $d, $e)
    {
        $data = $this->koneksi->query("INSERT INTO tbl_anggota VALUES ($a, '$b', $c, $d, $e)");
        return $data;
    }
    function selectanggotabyid($a)
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_anggota WHERE no_anggota = $a");
        return $data;
    }
    function edit_anggota($a, $b, $c, $d, $e)
    {
        $data = $this->koneksi->query("UPDATE tbl_anggota SET no_anggota = $a, nama = '$b', wajib = $c, pokok = $d, saldo = $e WHERE no_anggota = $a");
        return $data;
    }
    function hapus_anggota($a)
    {
        $data = $this->koneksi->query("DELETE FROM tbl_anggota WHERE no_anggota = $a");
        return $data;
    }
    // Kasir
    function get_data_kasir()
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_kasir");
        return $data;
    }
    function tambah_kasir($a, $b, $c)
    {
        $data = $this->koneksi->query("INSERT INTO tbl_kasir VALUES ($a, '$b', '$c')");
        return $data;
    }
    function selectkasirbyid($a)
    {
        $data = $this->koneksi->query("SELECT * FROM tbl_kasir WHERE kodeksr = $a");
        return $data;
    }
    function edit_kasir($a, $b, $c)
    {
        $data = $this->koneksi->query("UPDATE tbl_kasir SET kodeksr = $a, namaksr = '$b', password = '$c' WHERE kodeksr = $a");
        return $data;
    }
    function hapus_kasir($a)
    {
        $data = $this->koneksi->query("DELETE FROM tbl_kasir WHERE kodeksr = $a");
    }

    function cari_data($keyword)
    {
        $data= $this->koneksi->query("SELECT * FROM tbl_anggota WHERE nama LIKE '%$keyword%' OR no_anggota LIKE '%$keyword%' ");

        return $data;
    }
    
    function Register($a, $b, $c, $d, $e)
    {
        $data = $this->koneksi->query("INSERT INTO tbl_kasir VALUES ($a, '$b', '$c', '$d', '$e')");
        return $data;
    }
}