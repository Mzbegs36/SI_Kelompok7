<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
if( isset($_POST["submit"]) ) {

if (tambahbarang($_POST) > 0){
    echo "
    <script>
        alert('Berhasil menambah data!');
        document.location.href = 'data_barang.php';
    </script>
    ";
}else {
    echo "Gagal";
    echo "<br>";
    echo mysqli_error($conn);
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penambahan Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Tambah Barang</h1>
    </div>
    <form action="" method="post">
        <ul>
                <li>
                    <label for="nama">Nama Barang : </label>
                    <input type="text" name="nama" id="nama" required>
                </li>
                <li>
                    <label for="kode">Kode Barang : </label>
                    <input type="text" name="kode" id="kode" required>
                </li>
                <li>
                    <label for="kondisi">Kondisi Barang : </label>
                    <input type="text" name="kondisi" id="kondisi" required>
                </li>

                <li>
                    <label for="tgl">Tanggal Pembelian : </label>
                    <input type="date" name="tgl" id="tgl">
                </li>
                <li>
                    <button type="submit" name="submit">Tambahkan Data </button>
                </li>
        </ul>

    </form>

    <a href="data_barang.php">Kembali ke halaman data penanggung jawab</a>

</body>
</html>