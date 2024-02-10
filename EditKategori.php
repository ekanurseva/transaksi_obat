<?php
include("function.php");

$idkategori = $_GET['id'];
$kategori = query("SELECT * FROM kategori_obat WHERE idkategori = $idkategori")[0];

if (isset($_POST['edit_kategori'])) {
  if (edit_kategori($_POST) > 0) {
    echo "
          <script>
          alert('Data Berhasil Diubah');
          document.location.href='Main.php';
          </script>
      ";
  } else {
    echo "
          <script>
          alert('Data Gagal Diubah');
          document.location.href='Main.php';
          </script>
      ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Kategori</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="content m-0 atasan">
    <div class="container m-0 atasan" style="max-width:100%;border-radius: 10% 10%;">
      <h1>Edit Kategori</h1>

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
      <a class="btn btn-success1" href="Main.php">Kembali</a>
    </div>

    <div class="content ms-3">
      <div class="container">
        <form action="" method="post">
          <input type="hidden" name="idkategori" value="<?= $kategori['idkategori']; ?>">
          <input type="hidden" name="oldkategori" value="<?= $kategori['kategori']; ?>">

          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Kategori:</label>
            <input type="text" value="<?= $kategori['kategori']; ?>" name="kategori" class="form-control">
          </div>

          <button type="submit" name="edit_kategori" class="btn btn-primary mt-4">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>