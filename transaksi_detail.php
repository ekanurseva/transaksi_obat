<?php
    require_once 'function.php';

    $obat = query("SELECT * FROM obat ORDER BY idkategori");
    $kode_transaksi = getKodeTransaksi();

    $data_user = getUser();

    if(isset($_POST['submit'])) {
        if(doTransaksi($_POST) > 0) {
            echo "
                <script>
                    alert('Transaksi Berhasil');
                </script>
            ";

            if($data_user['level'] == 'admin') {
                echo "
                    <script>
                        document.location.href='Transaksi.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        document.location.href='Maintransaksi.php';
                    </script>
                ";
            }
        } else {
            echo "
                <script>
                    alert('Transaksi Gagal');
                    document.location.href='transaksi_detail.php';
                </script>
            ";
        }
    }
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
    <title>Transaksi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>


    <!-- Isi halaman menu lainnya di sini -->

    <div class="main-container">
        <!-- Sidebar -->

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="mt-1">
                    <a href="user.php" class="btn btn-danger">Data User</a>

                    <div class="mt-2">
                        <a href="Main.php" class="btn btn-danger">Data Obat</a>
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
    <div class="content m-0 atasan">
        <div class="row">
            <div class="col-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            <div class="col-7">
                <h1>Transaksi Detail</h1>
            </div>
            <div class="col-3" id="clock">
                
            </div>
        </div>



        <div class="contents">
            <div class="box1">
                <h5 class="mb-3">Tulis jumlah obat yang ingin di beli, jika tidak ingin membeli obat tertentu, biarkan 0</h5>
                <form method="post" action="">
                    <div class="row mb-3">
                        <label for="kode_transaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>

                        <div class="col-sm-10">
                            <input type="text" min="0" step="1" class="form-control" id="kode_transaksi" value="<?= $kode_transaksi; ?>" name="kode_transaksi" readonly>
                        </div>
                    </div>
                    <?php foreach($obat as $o) : ?>
                        <div class="row mb-3">
                            <label for="<?= $o['kode_obat']; ?>" class="col-sm-2 col-form-label"><?= $o['nama_obat']; ?></label>

                            <div class="col-sm-10">
                                <input type="number" min="0" step="1" class="form-control" id="<?= $o['kode_obat']; ?>" value="0" name="<?= $o['kode_obat']; ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <?php if($data_user['level'] == "admin") : ?>
                        <a href="Transaksi.php" class="btn btn-secondary me-3">Kembali</a>
                    <?php else : ?> 
                        <a href="Maintransaksi.php" class="btn btn-secondary me-3">Kembali</a>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
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

    </script>

</body>

</html>