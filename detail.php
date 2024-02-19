<?php
require_once 'function.php';

$id_transaksi = dekripsi($_GET['id']);
$data_user = getUser();
$data_detail = query("SELECT * FROM detail_transaksi WHERE transaksi_idtransaksi = $id_transaksi");

$data_transaksi = query("SELECT * FROM transaksi WHERE idtransaksi = $id_transaksi")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="content m-0 atasan">
        <div class="container m-0 atasan" style="max-width:100%;border-radius: 10% 10%;">
            <h1>Detail transaksi admin</h1>

            <div class="mt-2 mb-3" id="clock"></div>
        </div>

        <!-- Isi halaman menu lainnya di sini -->

        <div class="container btn-tambah ms-2 ">
            <?php if ($data_user['level'] == "admin"): ?>
                <a class="btn btn-success1" href="Transaksi.php">Kembali</a>
            <?php else: ?>
                <a class="btn btn-success1" href="Maintransaksi.php">Kembali</a>
            <?php endif; ?>

        </div>


        <div class="ms-5 mt-3" style="width:1020px">
            <label for="exampleFormControlInput1" class="form-label">
                <?= $data_transaksi['kode_transaksi']; ?>
            </label>
            <table class="table table-dark table-striped inner-table" id="transactionTable">
                <tfoot>
                    <table class="table table-dark table-striped" id="example">
                        <thead>
                            <tr class="text-center custom-Font">
                                <th scope="col">No</th>
                                <th scope="col">Kode obat</th>
                                <th scope="col">Nama obat</th>
                                <th scope="col">Expired</th>
                                <th scope="col">Kemasan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $total = 0;
                            foreach ($data_detail as $detail):
                                $id_obat = $detail['obat_idobat'];
                                $total += $detail['subtotal'];
                                $data_obat = query("SELECT * FROM obat WHERE idobat = $id_obat")[0];
                                ?>
                                <tr class="text-center">
                                    <th scope="row">
                                        <?= $i; ?>
                                    </th>
                                    <td>
                                        <?= $data_obat['kode_obat']; ?>
                                    </td>
                                    <td>
                                        <?= $data_obat['nama_obat']; ?>
                                    </td>
                                    <td>
                                        <?= date('d/m/Y', strtotime($data_obat['expired'])); ?>
                                    </td>
                                    <td>
                                        <?= $data_obat['kemasan']; ?>
                                    </td>
                                    <td>Rp
                                        <?= number_format($data_obat['harga'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <?= $detail['qty']; ?>
                                    </td>
                                    <td class="jumlah">Rp
                                        <?= number_format($detail['subtotal'], 0, ',', '.'); ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="Editdetailadmin.php?id=<?= enkripsi($detail['iddetail_transaksi']); ?>">edit</a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                        <!-- Kolom Total Transaksi -->
                        <tr class="text-center">
                            <th colspan="5" scope="col">Total Transaksi</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th id="totalTransaksi" scope="col">Rp
                                <?= number_format($total, 0, ',', '.'); ?>
                            </th>
                            <th scope="col"></th>
                        </tr>
                    </table>
                </tfoot>
            </table>
        </div>

        <!-- <script>
            // Script untuk menghitung total transaksi
            document.addEventListener("DOMContentLoaded", function () {
                updateTotal();

                function updateTotal() {
                    var jumlahs = document.getElementsByClassName("jumlah");
                    var total = 0;

                    for (var i = 0; i < jumlahs.length; i++) {
                        var jumlah = jumlahs[i].innerText;
                        total += parseInt(jumlah.replace("Rp ", "").replace(",", ""));
                    }

                    document.getElementById("totalTransaksi").innerText = "Rp " + total.toLocaleString();
                }
            });
        </script> -->
        <script src="script.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
</body>

</html>