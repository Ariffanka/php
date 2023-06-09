<?php
require "config.php";

if (isset($_POST["submit"])) {
    $old_kode_barang = $_POST['old_kode_barang'];
    $kode_barang = $_POST['kode_barang'];
    $nama_alat = $_POST['nama_alat'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $total = $harga * $jumlah;
    
    if ($total >= '200000') {
        $diskon = $total * 0.25;
    } else {
        $diskon = 0;
    }
    
    $bayar_total = $total - $diskon;
    
    // Hapus baris data lama dengan kode_barang yang lama
    $delete = mysqli_query($conn, "DELETE FROM tabel_elektrik WHERE kode_barang='$old_kode_barang'");
    
    // Tambahkan baris data baru dengan kode_barang yang baru beserta informasi lainnya
    $insert = mysqli_query($conn, "INSERT INTO tabel_elektrik (kode_barang, nama_alat, jumlah, harga, total, diskon, bayar) VALUES ('$kode_barang', '$nama_alat', '$jumlah', '$harga', '$total', '$diskon', '$bayar_total')");
    
    if ($delete && $insert) {
        header('location: tampil.php');
    } else {
        die("Data Gagal Diupdate");
    }
}
?>
