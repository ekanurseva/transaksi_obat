<?php 
  require_once 'function.php';

  $id = dekripsi($_GET['id']);

  $detail = query("SELECT * FROM detail_transaksi WHERE iddetail_transaksi = $id")[0];
  $idobat = $detail['obat_idobat'];

  $obat = query("SELECT * FROM obat WHERE idobat = $idobat")[0];

  if(isset($_POST['submit'])) {
    if(edit_detail_transaksi($_POST) > 0) {
      echo "
            <script>
              alert('Edit Detail Transaksi Berhasil');
              document.location.href='detail.php?id=" . enkripsi($detail['transaksi_idtransaksi']) . "';
            </script>
      ";
    } else {
      echo "
            <script>
              alert('Edit Detail Transaksi Gagal');
              document.location.href='Editdetailadmin.php?id=". $_GET['id'] . "';
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
      <h1>Detail edit admin</h1>

      <div class="mt-2" id="clock"></div>
    </div>

    <!-- Isi halaman menu lainnya di sini -->

    <div class="container btn-tambah ms-2 ">
      <a class="btn btn-success1" href="detail.php?id=<?= enkripsi($detail['transaksi_idtransaksi']); ?>">Kembali</a>
    </div>

    <div class="content ms-3">
      <div class="container">
        <form action="" method="post">
          <input type="hidden" name="iddetail_transaksi" value="<?= $detail['iddetail_transaksi']; ?>">
          <input type="hidden" name="obat_idobat" value="<?= $detail['obat_idobat']; ?>">
          <input type="hidden" name="oldqty" value="<?= $detail['qty']; ?>">

          <div class="mb-2" style="width:250px">
            <label for="nama_obat" class="form-label">Nama obat :</label>
            <input type="text" class="form-control" id="nama_obat" name="" value="<?= $obat['nama_obat']; ?>" disabled>
          </div>
  
          <div class="mb-2" style="width:100px">
            <label for="qty" class="form-label">Qty :</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?= $detail['qty']; ?>">
          </div>
  
          <button type="submit" class="btn btn-primary mt-4" name="submit">Konfirmasi</button>
        </form>
      </div>
    </div>
  </div>
  </div>
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>