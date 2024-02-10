<?php
include("function.php");

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "
    <script>
    alert('Registrasi Sukses');
    document.location.href='Login.php';
    </script>
    ";
  } else {
    echo "<script>
    alert('Registrasi Gagal');
    </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <title>Daftar</title>
  <link rel="stylesheet" href="Daftar.css"> <!-- Jangan lupa tambahkan stylesheet sesuai kebutuhan -->
</head>

<body>
  <div class="register-container">
    <h2>Daftar</h2>
    <form action="" method="post">
      <label for="username">Name:</label>
      <input type="text" name="nama" required>

      <label for="username">Username:</label>
      <input type="text" name="username" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" name="password" required>

      <label for="confirm_password">Confirm Password:</label>
      <input type="password" name="password2" required>

      <button type="submit" name="register" style="margin-bottom: 20px;">Daftar</button>
      <span>
        Sudah Punya Akun?
        <a href="Login.php" style="color: aquamarine" class="btn">Login</a>
      </span>
    </form>
  </div>

  <video id="video-background" autoplay muted loop>
    <source src="Medic.mp4" type="video/mp4">
    Your browser does not support the video tag.
  </video>
</body>

</html>