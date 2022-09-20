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
$peminjam = query("SELECT * FROM peminjam");

if (isset ($_POST["cari"]) ){
    $peminjam = caripmj($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div>
    <h1>Data Peminjam</h1>
    </div>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus
        placeholder="Cari data peminjam">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellpadding="1" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Kode Barang Pinjaman</th>
            <th>Domisili</th>
            <th>Tanggal Peminjaman</th>
            <th>Hapus Data</th>
            <th>Update Data</th>
            <th>Soft Deleted?</th>
        </tr>

    <?php $i = 1; ?>
    <?php foreach ($peminjam as $pmj ) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $pmj["nip_peminjam"]?></td>
            <td><?php echo $pmj["nama_peminjam"]?></td>
            <td><?php echo $pmj["kode_barang"]?></td>
            <td><?php echo $pmj["domisili_peminjam"]?></td>
            <td><?php echo $pmj["tanggal_pinjam"]?></td>
            <td><a href="hapus_peminjam.php?id=<?php echo $pmj["nip_peminjam"]?>">Hapus</a></td>
            <td><a href="update_peminjam.php?id=<?php echo $pmj["nip_peminjam"]?>">Update</a></td>
            <td><?php echo $pmj["IS_DELETED"]?></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    <a href="tambah_peminjam.php">Tambah Peminjam</a>
    <br>
    <a href="homeadmin.php">Kembali ke halaman awal</a>

</body>
</html>