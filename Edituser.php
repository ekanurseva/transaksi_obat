<?php
include("function.php");

$iduser = $_GET['id'];
$user = query("SELECT * FROM user WHERE iduser = $iduser")[0];

if (isset($_POST['edit_user'])) {
  if (update($_POST) > 0) {
    echo "
          <script>
          alert('user Berhasil Diubah');
          document.location.href='user.php';
          </script>
      ";
  } else {
    echo "
          <script>
          alert('user Gagal Diubah');
          document.location.href='user.php';
          </script>
      ";
  }
}

if ($user['level'] == "admin") {
  $level = "admin";
} else {
  $level = "kasir";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit user</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="content m-0 atasan">
    <div class="container m-0 atasan" style="max-width:100%;border-radius: 10% 10%;">
      <h1>Edit user</h1>

      <div class="mt-2">
        <?php
        // Logika PHP untuk menampilkan waktu
        date_default_timezone_set('Asia/Jakarta');
        $current_time = date("H:i:s");
        echo "<p>Waktu saat ini: $current_time</p>";
        ?>
      </div>
    </div>

    <!-- Isi halaman menu lainnya di sini -->

    <div class="container btn-tambah ms-2 ">
      <a class="btn btn-success1" href="user.php">Kembali</a>
    </div>

    <div class="content ms-3">
      <div class="container">
        <form action="" method="post">
          <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>">
          <input type="hidden" name="oldusername" value="<?= $user['username']; ?>">
          <input type="hidden" name="oldpassword" value="<?= $user['password']; ?>">
          <input type="hidden" name="oldemail" value="<?= $user['email']; ?>">

          <div class="mb-2" style="width:250px">
            <label class="form-label">Nama :</label>
            <input type="text" value="<?= $user['nama']; ?>" name="nama" class="form-control">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Username :</label>
            <input type="text" value="<?= $user['username']; ?>" name="username" class="form-control">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Email :</label>
            <input type="text" value="<?= $user['email']; ?>" name="email" class="form-control">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Password :</label>
            <input type="password" value="<?= $user['password']; ?>" name="password" class="form-control">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Konfirmasi Password :</label>
            <input type="password" value="<?= $user['password']; ?>" name="password2" class="form-control">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Level</label>
            <select class="form-select" name="level" aria-label="Default select example">
              <option value="<?= $user['level']; ?>" selected hidden><?= $level; ?></option>
              <option value="admin">Admin</option>
              <option value="kasir">Kasir</option>
            </select>
          </div>


          <button type="submit" name="edit_user" class="btn btn-primary mt-4">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>