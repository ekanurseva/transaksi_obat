<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Obat Keluar</title>
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
          <a href="Transaksi.php" class="btn btn-danger">Transaksi</a>
          <div class="mt-2">
            <a href="Masuk.php" class="btn btn-danger">Obat Masuk</a>
            <div class="mt-3">
              <a href="Keluar.php" class="btn btn-danger">Obat Keluar</a>
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
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <i class="bi bi-list"></i>
        </button>
      </div>
      <div class="col-7">
        <h1>Apotik 99</h1>
      </div>
      <div class="col-3">
        <?php
        // Logika PHP untuk menampilkan waktu
        date_default_timezone_set('Asia/Jakarta');
        $current_time = date("H:i:s");
        echo "<p>Waktu saat ini: $current_time</p>"; ?>
      </div>
    </div>



    <div class="contents">
      <div class="box1">
        <div class="container btn-tambah">
          <a class="btn btn-success" href="Tambah.php">Tambah Data</a>
        </div>
        <table class="table table-dark table-striped" id="example">
          <thead>
            <tr class="text-center custom-Font">
            <th scope="col">No</th>
              <th scope="col">Id obat</th>
              <th scope="col">Nama obat</th>
              <th scope="col">Jenis Obat</th>
              <th scope="col">Stock</th>
              <th scope="col">Expired</th>
              <th scope="col">Alat</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center">
              <th scope="row">1</th>
              <th scope="col">1111</th>
              <td>Paracetamol</td>
              <td>Kapsul</td>
              <td>25</td>
              <td>11/04/2024</td>
              <td>
                <a class="btn btn-primary btn-sm" href="Edit.php">edit</a>
                <a class="btn btn-danger btn-sm" href="Delete.php">delete</a>
              </td>
            </tr>
            <tr class="text-center">
              <th scope="row">2</th>
              <th scope="col">2222</th>
              <td>Formula OBH</td>
              <td>Sirup</td>
              <td>10</td>
              <td>11/04/2024</td>
              <td>
                <a class="btn btn-primary btn-sm" href="Edit.php">edit</a>
                <a class="btn btn-danger btn-sm" href="">delete</a>
              </td>
            </tr>
            <tr class="text-center">
              <th scope="row">3</th>
              <th scope="col">2222</th>
              <td>Ibuprofen</td>
              <td>Kapsul</td>
              <td>20</td>
              <td>23/05/2024</td>
              <td>
                <a class="btn btn-primary btn-sm" href="Edit.php">edit</a>
                <a class="btn btn-danger btn-sm" href="">delete</a>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="btnexport text-end mt-3">

          <!-- // Fungsi untuk menggenerate file CSV dari data 

              function exportToCsv($filename, $data)
              {
              header('Content-Type: text/csv');
              header('Content-Disposition: attachment; filename="' . $filename . '"');
              $output = fopen('php://output', 'w');
              foreach ($data as $row) {
              fputcsv($output, $row);
              }
              fclose($output);
              }
              // Jika tombol export ditekan
              if (isset($_POST['export'])) {
              // Panggil fungsi exportToCsv dengan nama file dan data
              exportToCsv('data_export.csv', $data);
              exit;
              }
              ?>
              <table border="1">


                foreach ($data as $row) {
                echo '<tr>';
                  foreach ($row as $value) {
                  echo '<td>' . $value . '</td>';
                  }
                  echo '</tr>';
                }
                ?>
              </table> -->

          <!-- Tombol untuk export data -->
          <form method="post">
            <button class="btn btn1 me-2 btn-sm" style="background : rgb(4, 237, 128);" type="submit" name="export">Import to Excel</.button>
              <button class="btn btn1 me-2 btn-sm" style="background : rgb(4, 237, 128);" type="submit" name="export">Export to Excel</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

</body>

</html>