<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];


$sewabrg = query("SELECT * FROM barang_ready WHERE kode_barang = $id")[0];

if( isset($_POST["submit"]) ) {

if (tambahpinjam($_POST) > 0){
    echo "
    <script>
        alert('Berhasil menambah data!');
        document.location.href = 'home.php';
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
    <title>Isi Data Peminjam</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Isi Data Peminjam</h1>
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
                    <input type="text" name="kode" id="kode" required
                    value="<?php echo $sewabrg["kode_barang"]?>">
                </li>

                <li>
                    <label for="tgl">Mulai Meminjam : </label>
                    <input type="date" name="tgl" id="tgl">
                </li>
                <li>
                    <button type="submit" name="submit">Tambahkan Data </button>
                </li>
        </ul>

    </form>

    <a href="sewa_barang.php">Kembali ke Tabel Barang Ready</a>

</body>
</html>