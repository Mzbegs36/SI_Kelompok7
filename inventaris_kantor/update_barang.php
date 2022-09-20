<?php

session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];


$updatebarang = query("SELECT * FROM barang WHERE kode_barang = $id")[0];

if( isset($_POST["submit"]) ) {

    if (updatebarang($_POST) > 0){
        echo "
        <script>
            alert('Berhasil meng-update data!');
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
    <title>Update Data Barang</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Update Data Barang</h1>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $updatebarang ["kode_barang"]?>">
        <ul>
                <li>
                    <label for="nama">Nama Barang : </label>
                    <input type="text" name="nama" id="nama" required
                    value="<?php echo $updatebarang["nama_barang"]?>">
                </li>

                <li>
                    <label for="kon">Kondisi Barang : </label>
                    <input type="text" name="kon" id="kon"
                    value="<?php echo $updatebarang["kondisi_barang"]?>">
                </li>

                <li>
                    <label for="tgl">Tanggal Pembelian : </label>
                    <input type="date" name="tgl" id="tgl" required
                    value="<?php echo $updatebarang["tanggal_beli"]?>">
                </li>

                <li>
                    <label for="bit">Soft Delete : </label>
                    <input type="checkbox" name="bit" id="bit"
                    value="<?php echo $updatebarang["IS_DELETED"]?>">
                </li>
                <li>
                    <button type="submit" name="submit">Update Data </button>
                </li>
        </ul>

    </form>

    <a href="data_barang.php">Kembali ke halaman data barang</a>

</body>
</html>