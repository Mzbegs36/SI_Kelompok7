<?php
session_start();
require 'functions.php';

if (isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $level = $_POST["role"];


    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            if ($row['role']==$level) {
                if ($level=='admin') {
                    $_SESSION["login"] = true;
                    $_SESSION["role"] = "admin";
                    header("Location: homeadmin.php");
                }
                elseif ($level=='user') {
                    $_SESSION["login"] = true;
                    $_SESSION["role"] = "user";
                    header("Location: home.php");
                }

            
                }
                else {
                    echo "
            <script>
            alert('Cek Kembali Role Anda!');
            </script>
            ";
                
                
            }
  
            exit;
            
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="judul">
        <h1>Login</h1>
    </div>
    <?php if (isset($error)) : ?>
    <p style="color: red; font-style: italic;">username / password tidak ditemukan</p>
    <?php endif;?>


    <form action="" method="post" class="login">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </li>
            <br>
            <li>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <br>
            <li>
                <label>Select Level User : </label>
                <select name="role">
                    <option selected value="user"> USER </option>
                    <option selected value="admin"> ADMIN </option>
                </select>
            </li>
            <br>

            <button type="submit" name="login">Login</button>
        </ul>
    </form>
    <p>Tidak punya akun? <a href="registrasi.php">Buat akun </a> Terlebih dahulu.</p>
</body>

</html>