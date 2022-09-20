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
$pj = query("SELECT * FROM pj_barang");

if (isset ($_POST["cari"]) ){
    $pj = caripj($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penanggung Jawab</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <div>
    <h1>Data Penanggung Jawab</h1>
    </div>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus
        placeholder="Cari data pj">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <table border="1" cellpadding="1" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>PJ Kode Barang</th>
            <th>Domisili</th>
            <th>Hapus Data</th>
            <th>Update Data</th>
            <th>Soft Deleted?</th>
        </tr>

    <?php $i = 1; ?>
    <?php foreach ($pj as $pjb ) : ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $pjb["nip_pj"]?></td>
            <td><?php echo $pjb["nama_pj"]?></td>
            <td><?php echo $pjb["kode_barang"]?></td>
            <td><?php echo $pjb["domisili_pj"]?></td>
            <td><a href="hapus_pj.php?id=<?php echo $pjb["nip_pj"]?>">Hapus</a></td>
            <td><a href="update_pj.php?id=<?php echo $pjb["nip_pj"]?>">Update</a></td>
            <td><?php echo $pjb["IS_DELETED"]?></td>
        </tr>
    <?php $i++; ?>
    <?php endforeach;?>

    </table>
    <a href="tambah_pj.php">Tambah Data Penanggung Jawab</a>
    <br>
    <a href="homeadmin.php">Kembali ke halaman awal</a>

</body>
</html>