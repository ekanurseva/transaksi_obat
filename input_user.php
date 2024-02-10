<?php
include("function.php");

if (isset($_POST["input"])) {
  if (register_pengguna($_POST) > 0) {
    echo "
    <script>
    alert('Registrasi Sukses');
    document.location.href='user.php';
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

      <div class="form-check form-check-inline text-white row">
        <div class="col-sm-2">
          <input class="form-check-input" type="radio" name="level" id="user" value="kasir">
        </div>
        <div class="col-sm-5">
          <label class="form-check-label" for="user">Kasir</label>
        </div>
      </div>
      <div class="form-check form-check-inline text-white row">
        <div class="col-sm-2">
          <input class="form-check-input" type="radio" name="level" id="admin" value="admin">
        </div>
        <div class="col-sm-5">
          <label class="form-check-label" for="admin">Admin</label>
        </div>
      </div>

      <button type="submit" name="input">Daftar</button>
    </form>
  </div>

</body>

</html>