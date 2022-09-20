<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
else if ($_SESSION["role"]=='user'){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$barang = query("SELECT * FROM barang");

if (isset ($_POST["cari"]) ){
    $barang = caribarang($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div>
    <h1>Data Barang</h1>
    </div>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus
        placeholder="Cari data barang">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellpadding="1" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Kode Barang</th>
            <th>Kondisi Barang</th>
            <th>Tanggal Beli</th>
            <th>Hapus Data</th>
            <th>Update Data</th>
            <th>Soft Deleted?</th>
        </tr>

    <?php $i = 1; ?>
    <?php foreach ($barang as $brg ) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $brg["nama_barang"]?></td>
            <td><?php echo $brg["kode_barang"]?></td>
            <td><?php echo $brg["kondisi_barang"]?></td>
            <td><?php echo $brg["tanggal_beli"]?></td>
            <td><a href="hapus_barang.php?id=<?php echo $brg["kode_barang"]?>">Hapus</a></td>
            <td><a href="update_barang.php?id=<?php echo $brg["kode_barang"]?>">Update</a></td>
            <td><?php echo $brg["IS_DELETED"]?></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    <a href="tambah_barang.php">Tambah Barang</a>
    <br>
    <a href="homeadmin.php">Kembali ke halaman awal</a>

</body>
</html>