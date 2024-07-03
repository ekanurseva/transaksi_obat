<?php
require_once 'function.php';

$data_transaksi = query("SELECT * FROM transaksi ORDER BY tanggal ASC");
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
                <h1>APOTEK 99 | Transaksi Admin</h1>
            </div>
            <div class="col-3" id="clock">

            </div>
        </div>



        <div class="contents">
            <div class="box1">
                <!-- Button trigger modal -->
                <a href="transaksi_detail.php" class="btn btn-primary ms-3">
                    Tambah transaksi
                </a>

                <div>
                    <a class="btn btn1 me-2 mb-3 mt-3 btn-sm" style="background : rgb(4, 237, 128);"
                        href="laporan-excel.php">Export to Excel</a>
                </div>

                <table class="table table-dark table-striped inner-table" id="example">
                    <thead>
                        <div class="kode_obat">
                            <tr class="text-center custom-Font">
                                <th scope="col">No</th>
                                <th scope="col">Kode transaksi</th>
                                <th scope="col">Tanggal transaksi</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Alat</th>
                            </tr>
                        </div>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data_transaksi as $trans):
                            $subtotal = 0;
                            $idtransaksi = $trans['idtransaksi'];

                            $tanggal = date('d/m/Y | H:i:s', strtotime($trans['tanggal']));

                            $data_detail = query("SELECT * FROM detail_transaksi WHERE transaksi_idtransaksi = $idtransaksi"); foreach ($data_detail as $detail) {
                                $subtotal += $detail['subtotal'];
                            }

                            ?>
                            <tr class="text-center">
                                <th scope="row">
                                    <?= $i; ?>
                                </th>
                                <th scope="col">
                                    <?= $trans['kode_transaksi']; ?>
                                </th>
                                <td>
                                    <?= $tanggal; ?>
                                </td>
                                <td>Rp
                                    <?= number_format($subtotal, 0, ',', '.'); ?>
                                </td>
                                <td>
                                    <a class="btn btn-info text-black btn-sm"
                                        href="detail.php?id=<?= enkripsi($trans['idtransaksi']); ?>">detail</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>

                </table>

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