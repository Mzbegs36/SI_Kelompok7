<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
if( isset($_POST["submit"]) ) {

if (tambahpj($_POST) > 0){
    echo "
    <script>
        alert('Berhasil menambah data!');
        document.location.href = 'data_pj.php';
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
    <title>Penambahan Penanggung Jawab</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Tambah Data Penanggung Jawab</h1>
    </div>
    <form action="" method="post">
        <ul>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required>
                </li>

                <li>
                    <label for="nip">NIP : </label>
                    <input type="text" name="nip" id="nip" required>
                </li>

                <li>
                    <label for="dom">Domisili : </label>
                    <input type="text" name="dom" id="dom">
                </li>

                <li>
                    <label for="kode">Kode Barang : </label>
                    <input type="text" name="kode" id="kode" required>
                </li>
                <li>
                    <button type="submit" name="submit">Tambahkan Data </button>
                </li>
        </ul>

    </form>

    <a href="data_pj.php">Kembali ke halaman data penanggung jawab</a>

</body>
</html>