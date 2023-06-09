<?php
$koneksi = mysqli_connect("localhost","root","","toko_elektrik");
if (isset($_GET['kode_barang'])) {
    $kode_barang = $_GET['kode_barang'];

    $req=mysqli_query($koneksi,"delete from tabel_elektrik where kode_barang=$kode_barang");

    if ($koneksi) {
        header('location: tampil.php');
    }else {
        die('gagal delete...');
    }
}
?>