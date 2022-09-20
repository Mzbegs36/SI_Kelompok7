<?php
session_start();
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];


$updatepj = query("SELECT * FROM pj_barang WHERE nip_pj = $id")[0];

if( isset($_POST["submit"]) ) {

    if (updatepj($_POST) > 0){
        echo "
        <script>
            alert('Berhasil meng-update data!');
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
    <title>Update Data Penanggung Jawab</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Update Data Penanggung Jawab</h1>
    </div>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $updatepj ["nip_pj"]?>">
        <ul>
                <li>
                    <label for="nama">Nama : </label>
                    <input type="text" name="nama" id="nama" required
                    value="<?php echo $updatepj["nama_pj"]?>">
                </li>


                <li>
                    <label for="dom">Domisili : </label>
                    <input type="text" name="dom" id="dom"
                    value="<?php echo $updatepj["domisili_pj"]?>">
                </li>

                <li>
                    <label for="kode">Kode Barang : </label>
                    <input type="text" name="kode" id="kode" required
                    value="<?php echo $updatepj["kode_barang"]?>">
                </li>

                <li>
                    <label for="bit">Soft Delete : </label>
                    <input type="checkbox" name="bit" id="bit"
                    value="<?php echo $updatepj["IS_DELETED"]?>">
                </li>
                <li>
                    <button type="submit" name="submit">Update Data </button>
                </li>
        </ul>

    </form>

    <a href="data_pj.php">Kembali ke halaman data peminjam</a>

</body>
</html>