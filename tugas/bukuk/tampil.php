<?php

$koneksi = mysqli_connect("localhost","root","","toko_elektrik");
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


$req = mysqli_query($koneksi,"SELECT * FROM `tabel_elektrik`");

$res = [];
    
while($row = mysqli_fetch_assoc($req)){
    $res[] = $row;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #3ca9e2;
            color: #fff;
            font-weight: bold;
        }

        a {
            text-decoration: none;
            color: #3ca9e2;
        }

        .btn {
            background-color: #3ca9e2;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Tampilkan</h1>
    <div align="center">
        <a href="form.php">Tambahkan Data</a> | <a href="logout.php" class="btn">Logout</a>
    </div>
    <br/>
    <table>
        <tr>
            <th>KODE BARANG</th>
            <th>NAMA ALAT</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
            <th>TOTAL</th>
            <th>DISKON</th>
            <th>BAYAR</th>
            <th>ACTION</th>
        </tr>
        <?php foreach($res as $r) : ?>
        <tr>
            <td><?= $r["kode_barang"]?></td>
            <td><?= $r["nama_alat"]?></td>
            <td><?= $r["jumlah"]?></td>
            <td><?= $r["harga"]?></td>
            <td><?= $r["total"]?></td>
            <td><?= $r["diskon"]?></td>
            <td><?= $r["bayar"]?></td>
            <td>
                <a href='update.php?kode_barang=<?= $r["kode_barang"]?>'>EDIT</a>
                | <a href='delete.php?kode_barang=<?= $r["kode_barang"]?>'>HAPUS</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
