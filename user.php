<?php
require 'function.php';


$data = query("SELECT * FROM user");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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
        <div class="content m-0 atasan">
            <div class="row">
                <div class="col-1">
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
                <div class="col-7">
                    <h1>User</h1>
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
                    <!-- Button trigger modal -->
                    <div class="tambahuser">
                        <a class="btn btn-success" href="input_user.php">Tambahkan akun baru</a>
                    </div>

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $d['nama']; ?>
                                    </td>
                                    <td>
                                        <?= $d['username']; ?>
                                    </td>
                                    <td>
                                        <?= $d['email']; ?>
                                    </td>
                                    <td>
                                        <?= $d['level']; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="Edituser.php?id= <?= $d['iduser']; ?>">edit</a>
                                        <a href="delete_user.php?id=<?= $d['iduser']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">
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