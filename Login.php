<?php
include('function.php');

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //cek username apakah ada di database atau tidak
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");


    // mysqli_num_rows() untuk mengetahui ada berapa baris data yang dikembalikan
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);

        //password_verify() untuk mengecek apakah sebuah password itu sama atau tidak dengan hash nya
        //parameternya yaitu string yang belum diacak dan string yang sudah diacak
        if (password_verify($password, $row["password"])) {
            setcookie('DataObat', enkripsi($row['iduser']), time() + 14400);

            if ($row["level"] === "admin") {
                echo "<script>
                  document.location.href='Main.php';
              </script>";
                exit;
            } elseif ($row["level"] === "kasir") {
                echo "<script>
                  document.location.href='Maintransaksi.php';
              </script>";
                exit;
            }
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="login.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            color: aliceblue;
            background-color: #8095ff;
            border-radius: 8px;
            box-shadow: 10px 10px 7px #f435ff;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .remember-forgot-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .remember-forgot-container label {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <form method="POST" action="">
        <div class="login-container">
            <h2>Login</h2>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    Username/Password Salah
                </div>
            <?php endif; ?>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>

            <button name="submit" type="submit" style="margin-bottom: 10px;">Login</button>
            <a class="btn btn-success1 text-decoration-none" href="Daftar.php">Buat akun?</a>
        </div>
    </form>


    <!-- Video Background -->
    <video id="video-background" autoplay muted loop>
        <source src="Medic.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Content -->
    <div class="content">
        <h3>Selamat Datang</h3>
        <h1>APOTEK 99</h1>
    </div>
</body>

</html>