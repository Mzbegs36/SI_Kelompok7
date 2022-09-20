<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$ready = query("SELECT * FROM barang_ready");
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
    <h1>Barang-barang Yang Ready</h1>
</div>
    <table border="1" cellpadding="1" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Penanggung Jawab</th>
            <th>Kondisi Barang</th>
            <th>Kode Barang</th>
            <th>Sewa</th>
        </tr>

    <?php $i = 1; ?>
    <?php foreach ($ready as $rdy ) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rdy["nama_barang"]?></td>
            <td><?php echo $rdy["nama_pj"]?></td>
            <td><?php echo $rdy["kondisi_barang"]?></td>
            <td><?php echo $rdy["kode_barang"]?></td>
            <td ><a href="sewa.php?id=<?php echo $rdy["kode_barang"]?>">Pilih</a></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    <br>
    <a href="home.php">Kembali ke Homepage </a>
</body>
</html>