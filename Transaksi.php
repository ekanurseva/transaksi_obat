<?php
require 'function.php';
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
                <h1>Transaksi Admin</h1>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Tambah Kolom</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-dark">
                                    <div class="mb-2" style="width:250px">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Kategori</option>
                                            <option value="1">Antibiotic</option>
                                            <option value="2">Vitamin & Suplemen</option>
                                            <option value="3">Analgesik (Pereda Nyeri)</option>
                                            <option value="3">Antipiretik (Penurun Demam)</option>
                                            <option value="herbal">Obat Herbal</option>
                                        </select>
                                        <label for="exampleFormControlInput1" class="form-label">kode obat :</label>
                                        <input type="kode_obat" class="form-control" id="kode_obat"
                                            placeholder="kode obat">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">nama obat :</label>
                                        <input type="nama_obat" class="form-control" id="nama_obat"
                                            placeholder="nama obat">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">deskripsi :</label>
                                        <input type="deskripsi" class="form-control" id="deskripsi"
                                            placeholder="deskripsi">
                                    </div>
                                    <div class="mb-2" style="width:100px">
                                        <label for="exampleFormControlInput1" class="form-label">dosis :</label>
                                        <input type="dosis" class="form-control" id="dosis" placeholder="dosis">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">harga :</label>
                                        <input type="harga" class="form-control" id="kharga" placeholder="harga">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">stok :</label>
                                        <input type="stok" class="form-control" id="stok" placeholder="stok">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">expired :</label>
                                        <input type="expired" class="form-control" id="expired" placeholder="expired">
                                    </div>
                                    <div class="mb-2" style="width:250px">
                                        <label for="exampleFormControlInput1" class="form-label">kemasan :</label>
                                        <input type="kemasan" class="form-control" id="kemasan" placeholder="kemasan">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#transaksi">
                    Tambah transaksi
                </button>
                <!-- Modal -->
                <form action="detail.php">
                    <div class="modal fade" id="transaksi" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-dark" id="transaksi">Tambah transaksi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-dark">

                                        <div class="mb-2" style="width:250px">
                                            <label for="kodetransaksi" class="form-label">kode transaksi :</label>
                                            <input type="text" class="form-control" id="kodetransaksi"
                                                placeholder="kode transaksi">
                                        </div>

                                        <div class="mb-2" style="width:250px">
                                            <label for="tanggaltransaksi" class="form-label">Tanggal transaksi :</label>
                                            <input type="text" class="form-control" id="tanggaltransaksi"
                                                placeholder="tanggal transaksi">
                                        </div>

                                        <div class="mb-2" style="width:250px">
                                            <label for="obat" class="form-label">Obat :</label>
                                            <input type="text" class="form-control" id="obat" placeholder="obat">
                                        </div>

                                        <div class="mb-2" style="width:250px">
                                            <label for="jumlah" class="form-label">Jumlah :</label>
                                            <input type="text" class="form-control" id="jumlah" placeholder="jumlah">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <form method="post">
                    <button class="btn btn1 me-2 mb-3 mt-3 btn-sm" style="background : rgb(4, 237, 128);" type="submit"
                        name="export">Export to Excel</button>
                </form>

                <table class="table table-dark table-striped inner-table">
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
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <th scope="col">1111</th>
                            <td>11/01/2024</td>
                            <td>Rp 9.000</td>
                            <td>
                                <a class="btn btn-info text-black btn-sm" href="detail.php">detail</a>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <th scope="col">2222</th>
                            <td>11/01/2024</td>
                            <td>Rp 20.000</td>
                            <td>
                                <a class="btn btn-info text-black btn-sm" href="detail.php">detail</a>
                            </td>
                        </tr>

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
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>

</body>

</html>