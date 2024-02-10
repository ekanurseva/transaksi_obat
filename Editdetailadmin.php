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
      <h1>Detail edit admin</h1>

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
      <a class="btn btn-success1" href="detail.php">Kembali</a>
    </div>

    <div class="content ms-3">
      <div class="container">
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Kode obat :</label>
          <input type="kode_obat" class="form-control" id="exampleFormControlInput1" placeholder="kode obat">
        </div>
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Ubah nama obat :</label>
          <input type="nama_obat" class="form-control" id="exampleFormControlInput1" placeholder="merek obat">
        </div>
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Ubah expired :</label>
          <input type="expired" class="form-control" id="exampleFormControlInput1" placeholder="tanggal kadaluarsa">
        </div>
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Ubah kemasan :</label>
          <input type="kemasan" class="form-control" id="exampleFormControlInput1" placeholder="kemasan">
        </div>
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Ubah harga :</label>
          <input type="harga" class="form-control" id="exampleFormControlInput1" placeholder="harga">
        </div>
        <div class="mb-2" style="width:100px">
          <label for="exampleFormControlInput1" class="form-label">Ubah qty :</label>
          <input type="qty" class="form-control" id="exampleFormControlInput1" placeholder="qty">
        </div>
        <div class="mb-2" style="width:250px">
          <label for="exampleFormControlInput1" class="form-label">Ubah jumlah :</label>
          <input type="jumlah" class="form-control" id="exampleFormControlInput1" placeholder="jumlah">
        </div>

        <button type="button" class="btn btn-primary mt-4">Konfirmasi</button>
      </div>
    </div>
  </div>
  </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>