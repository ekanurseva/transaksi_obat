<?php
include("function.php");


if (isset($_POST["kategori"])) {
  if (input_kategori($_POST) > 0) {
    echo "
    <script>
    alert('Input Data Berhasil');
    document.location.href='Main.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Gagal Ditambah');
    </script>";
  }
}

if (isset($_POST["obat"])) {
  if (input_obat($_POST) > 0) {
    echo "
    <script>
    alert('Input Data Berhasil');
    document.location.href='Main.php';
    </script>";
  } else {
    echo "<script>
    alert('Data Gagal Ditambah');
    </script>";
  }
}

$kategori = query("SELECT * FROM kategori_obat");
$obat = query("SELECT * FROM obat");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Menu</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>


  <!-- Isi halaman menu lainnya di sini -->

  <div class="main-container">
    <!-- Sidebar -->

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="mt-1">
          <a href="user.php" class="btn btn-danger">Data User</a>
          <div class="mt-2">
            <a href="Main.php" class="btn btn-danger">Data obat</a>
            <div class="mt-3">
              <a href="Transaksi.php" class="btn btn-danger">Transaksi</a>
              <div class="mt-4">
                <a href="Logout.php" class="btn btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="content m-0 atasan">
    <div class="row">
      <div class="col-1">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
          aria-controls="offcanvasExample">
          <i class="bi bi-list"></i>
        </button>
      </div>
      <div class="col-7">
        <h1>Data Obat Admin</h1>
      </div>
      <div class="col-3" id="clock">

      </div>
    </div>




    <div class="contents">
      <div class="box1">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah data obat
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Tambah data obat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="" method="post">
                <div class="modal-body">
                  <div class="text-dark">
                    <div class="mb-2" style="width:250px">
                      <label class="form-label text-white">Penyakit</label>
                      <select class="boxc form-control" name="idkategori" require>
                        <option hidden selected>--Pilih Kategori--</option>
                        <?php
                        foreach ($kategori as $p):
                          ?>
                          <option value="<?php echo $p['idkategori'] ?>"><?php echo $p['kategori'] ?></option>
                          <?php
                        endforeach
                        ?>
                      </select>
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">kode obat :</label>
                      <input type="text" name="kodeobat" class="form-control" id="kode_obat" placeholder="kode obat">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">nama obat :</label>
                      <input type="text" name="namaobat" class="form-control" id="nama_obat" placeholder="nama obat">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">deskripsi :</label>
                      <textarea name="deskripsi" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="mb-2 text-white" style="width:100px">
                      <label class="form-label">dosis :</label>
                      <input type="text" name="dosis" class="form-control" id="dosis" placeholder="dosis">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">harga :</label>
                      <input name="harga" type="number" class="form-control" id="kharga" placeholder="harga">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">stok :</label>
                      <input name="stok" type="text" class="form-control" id="stok" placeholder="stok">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">expired :</label>
                      <input name="expired" type="date" class="form-control" id="expired" placeholder="expired">
                    </div>
                    <div class="mb-2 text-white" style="width:250px">
                      <label class="form-label">kemasan :</label>
                      <input name="kemasan" type="text" class="form-control" id="kemasan" placeholder="kemasan">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="obat" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#kategori">
          Tambah Kategori
        </button>
        <!-- Modal -->
        <form method="post">
          <div class="modal fade" id="kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5 text-dark" id="kategori">Tambah Kategori</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="text-dark">

                    <div class="mb-2" style="width:250px">
                      <label for="kategori" class="form-label">Tambahkan Kategori :</label>
                      <input type="text" class="form-control" name="kategori" id="kategori" placeholder="kategori">
                    </div>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="kategori" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <!-- Modal Selesai -->

        <div class="mb-2">
          <div class="text-center">
            <h4>Tabel Kategori</h4>
          </div>
          <table class="table table-dark table-striped" id="example">
            <thead>
              <tr class="text-center custom-Font">
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Kategori Obat</th>
                <th scope="col" class="text-center">Alat</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($kategori as $k):
                ?>
                <tr class="text-center">
                  <th scope="row">
                    <?= $i; ?>
                  </th>
                  <th scope="col">
                    <?= $k['kategori']; ?>
                  </th>
                  <td>
                    <a class="btn btn-primary btn-sm" href="EditKategori.php?id= <?= $k['idkategori']; ?>">edit</a>
                    <a href="delete_kategori.php?id=<?= $k['idkategori']; ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                      Hapus
                    </a>
                  </td>
                </tr>
                <?php
                $i++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>

        <div class="mt-4">
          <div class="text-center">
            <h4>Tabel Obat</h4>
          </div>
          <table class="table table-dark table-striped" id="example2">
            <thead>
              <tr class="text-center custom-Font">
                <th scope="col">No</th>
                <th scope="col">Kode obat</th>
                <th scope="col">Nama obat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Dosis</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Expired</th>
                <th scope="col">Kemasan</th>
                <th scope="col">Kategori</th>
                <th scope="col">Alat</th>
              </tr>
            </thead>
            <tbody>
              <?php $j = 1; foreach ($obat as $o):
                ?>
                <tr class="text-center">
                  <td scope="row">
                    <?= $j; ?>
                  </td>
                  <td scope="col">
                    <?= $o['kode_obat']; ?>
                  </td>
                  <td scope="col">
                    <?= $o['nama_obat']; ?>
                  </td>
                  <td scope="col" style="font-size: 12.5px;">
                    <?= $o['deskripsi']; ?>
                  </td>
                  <td scope="col">
                    <?= $o['dosis']; ?>
                  </td>
                  <td scope="col">
                    Rp
                    <?= number_format($o['harga'], 0, ',', '.'); ?>
                  </td>
                  <td scope="col">
                    <?= $o['stok']; ?>
                  </td>
                  <td scope="col">
                    <?= $o['expired']; ?>
                  </td>
                  <td scope="col">
                    <?= $o['kemasan']; ?>
                  </td>
                  <?php
                  $idkategori = $o['idkategori'];
                  $nama_kategori = query("SELECT kategori FROM kategori_obat WHERE idkategori = $idkategori")[0];
                  ?>
                  <td>
                    <?= $nama_kategori['kategori']; ?>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-sm" href="Edit.php?id= <?= $o['idobat']; ?>">edit</a>
                    <a href="delete_obat.php?id=<?= $o['idobat']; ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
                      Hapus
                    </a>
                  </td>
                </tr>
                <?php
                $j++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>

  <script src="script.js"></script>
  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
    $(document).ready(function () {
      $('#example2').DataTable();
    });
  </script>


</body>

</html>