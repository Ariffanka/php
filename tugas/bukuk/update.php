<?php
$koneksi = mysqli_connect("localhost","root","","toko_elektrik");
if (!isset($_GET['kode_barang'])) {
    header('location: tampil.php');
}
$id = $_GET['kode_barang'];

$req= "SELECT * FROM tabel_elektrik where kode_barang=$id";
$koneksi=mysqli_query($koneksi, $req);
$r=mysqli_fetch_assoc($koneksi);


if(mysqli_num_rows($koneksi) <1 ){
    die("data tidak di temukan...");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TOKO</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: bold;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="number"] {
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"],
    input[type="button"] {
      background-color: #3ca9e2;
      color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
      background-color: #2c89c1;
    }

    .btn-link {
      display: inline-block;
      margin-top: 10px;
      text-decoration: none;
      color: #3ca9e2;
      font-weight: bold;
    }

    .btn-link:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Form Input Data Penjualan<br>Toko Elektrik Pijarku</h1>
    <form name="anggota" method="post" action="simpan_update.php">
      <input type="hidden" name="old_kode_barang" value="<?= $r['kode_barang']?>">
      <label for="kode_barang">KODE BARANG</label>
      <input type="text" name="kode_barang" placeholder="Masukkan ID Barang" value="<?= $r['kode_barang']?>">
      <label for="nama_alat">NAMA ALAT</label>
      <input type="text" name="nama_alat" placeholder="Masukkan Nama Alat" value="<?= $r['nama_alat']?>">
      <label for="jumlah">JUMLAH</label>
      <input type="number" name="jumlah" placeholder="Masukkan Jumlah Alat" value="<?= $r['jumlah']?>">
      <label for="harga">HARGA</label>
      <input type="number" name="harga" placeholder="Masukkan Harga Alat" value="<?= $r['harga']?>">
      <input type="submit" name="submit" value="UPDATE">
      <a href="tampil.php" class="btn-link">KEMBALI</a>
    </form>
  </div>
</body>

</html>