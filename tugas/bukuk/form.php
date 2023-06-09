<?php


$kon = mysqli_connect("localhost","root","","toko_elektrik");


if(isset($_POST["submit"])){

$kode_barang = $_POST['kode_barang'];
$nama_alat = $_POST['nama_alat'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];
$total = $harga * $jumlah;
if ($total >= '200000' ) {
    $diskon = $total / 5;
} else {
    $diskon = '0';
}
$bayar_total = $total - $diskon;
$add=mysqli_query($kon, "insert into tabel_elektrik (kode_barang,nama_alat,jumlah,harga,total,diskon,bayar) VALUES ('$kode_barang', '$nama_alat', '$jumlah', '$harga', '$total', '$diskon','$bayar_total')");

if ($add) {
  header('location: tampil.php');
}else {
  die ("Data Gagal Diupdate");
}
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
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            height: 40px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-button {
            text-align: center;
            margin-top: 20px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #3ca9e2;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            width: 120px;
            height: 40px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        input[type="reset"] {
            background-color: #ccc;
        }
    </style>
</head>

<body>
    <h1>Form Input Data Penjualan<br>Toko Elektrik Pijarku</h1>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="kode">KODE BARANG</label>
                <input type="text" name="kode_barang" required>
            </div>
            <div class="form-group">
                <label for="nama">NAMA ALAT</label>
                <input type="text" name="nama_alat" required>
            </div>
            <div class="form-group">
                <label for="harga">HARGA</label>
                <input type="number" name="harga" required>
            </div>
            <div class="form-group">
                <label for="jumlah">JUMLAH</label>
                <input type="number" name="jumlah" required>
            </div>
            <div class="form-button">
                <input type="submit" name="submit" value="Simpan">
                <input type="reset" name="reset" value="Batal">
            </div>
        </form>
    </div>
</body>

</html>
