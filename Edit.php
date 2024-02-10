<?php
include("function.php");

$idobat = $_GET['id'];
$obat = query("SELECT * FROM obat WHERE idobat = $idobat")[0];

$kategori = query("SELECT * FROM kategori_obat");

if (isset($_POST['edit_obat'])) {
  if (edit_obat($_POST) > 0) {
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
  <title>Edit admin</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="content m-0 atasan">
    <div class="container m-0 atasan" style="max-width:100%;border-radius: 10% 10%;">
      <h1>Edit admin</h1>

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
          <input type="hidden" name="idobat" value="<?= $obat['idobat']; ?>">
          <input type="hidden" name="oldobat" value="<?= $obat['nama_obat']; ?>">

          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Kode obat :</label>
            <input name="kodeobat" type="text" class="form-control" value="<?= $obat['kode_obat']; ?>" id="exampleFormControlInput1" placeholder="kode obat">
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Ubah nama obat :</label>
            <input name="namaobat" type="text" class="form-control" value="<?= $obat['nama_obat']; ?>" id="exampleFormControlInput1" placeholder="merek obat">
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Ubah deskripsi :</label>
            <textarea name="deskripsi" rows="3" class="form-control"><?php echo $obat['deskripsi']; ?></textarea>
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Ubah dosis :</label>
            <input name="dosis" type="text" class="form-control" value="<?= $obat['dosis']; ?>" id="exampleFormControlInput1" placeholder="Deskripsi">
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Ubah harga :</label>
            <input name="harga" type="text" class="form-control" value="<?= $obat['harga']; ?>" id="exampleFormControlInput1" placeholder="harga">
          </div>
          <div class="mb-2" style="width:100px">
            <label for="exampleFormControlInput1" class="form-label">Ubah Stok :</label>
            <input name="stok" type="text" class="form-control" value="<?= $obat['stok']; ?>" id="exampleFormControlInput1" placeholder="stok">
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">Ubah tanggal kadaluarsa :</label>
            <input name="expired" type="date" class="form-control" value="<?= $obat['expired']; ?>" id="exampleFormControlInput1" placeholder="expired">
          </div>
          <div class="mb-2" style="width:250px">
            <label for="exampleFormControlInput1" class="form-label">ubah kemasan :</label>
            <input name="kemasan" type="text" class="form-control" value="<?= $obat['kemasan']; ?>" id="exampleFormControlInput1" placeholder="kemasan">
          </div>
          <div class="mb-2" style="width:250px">
            <label class="form-label">Kategori</label>
            <select class="boxc form-control" name="idkategori" require>
              <option value="" hidden selected>--Pilih Kategori--</option>
              <?php
              foreach ($kategori as $p) :
              ?>
                <option value="<?php echo $p['idkategori'] ?>" <?php echo ($p['idkategori'] == $obat['idkategori']) ? 'selected' : ''; ?>><?php echo $p['kategori'] ?></option>
              <?php
              endforeach
              ?>
            </select>
          </div>

          <button name="edit_obat" type="submit" class="btn btn-primary mt-4">Konfirmasi</button>
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