<?php
require 'functions.php';

if (isset($_POST["register"]) ) {

    if(registrasi($_POST) > 0) {
        echo "
        <script>
        alert('user baru berhasil ditambahkan!');
        </script>
        ";
        

    }else {
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
    <title>Buat Akun</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="judul">
    <h1>Registrasi</h1>
    </div>
    <form action="" method="post" class='login'>

        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>   
                <label for="password2">Password Confirmation</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="register">Register
                    
                </button>
            </li>
        </ul>

    </form>
    <a href="login.php">Kembali ke halaman Login</a>
</body>
</html>