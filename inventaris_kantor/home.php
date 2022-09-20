<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$borrowed = query("SELECT * FROM barang_dipinjam");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>
<a href="logout.php">Logout</a>
<div>
    <h1>Barang-barang Sedang Dipinjam</h1>
</div>
    <table border="1" cellpadding="1" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Penanggung Jawab</th>
            <th>Peminjam</th>
            <th>Tanggal Peminjaman</th>
        </tr>

    <?php $i = 1; ?>
    <?php foreach ($borrowed as $brwd ) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $brwd["nama_barang"]?></td>
            <td><?php echo $brwd["nama_pj"]?></td>
            <td><?php echo $brwd["nama_peminjam"]?></td>
            <td><?php echo $brwd["tanggal_pinjam"]?></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    <br>

    <a href="sewa_barang.php"> Sewa Barang</a>
</body>
</html>