<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail transaksi kasir</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="content m-0 atasan">
        <div class="container m-0 atasan" style="max-width:100%;border-radius: 10% 10%;">
            <h1>Detail transaksi kasir</h1>

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
            <a class="btn btn-success1" href="Maintransaksi.php">Kembali</a>
        </div>


        <div class="ms-5 mt-3" style="width:1020px">
            <label for="exampleFormControlInput1" class="form-label">Kode Transaksi</label>
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
                            <tr class="text-center">
                                <th scope="row">1</th>
                                <th scope="col">1111</th>
                                <td>Paracetamol</td>
                                <td>11/04/2024</td>
                                <td>Kapsul</td>
                                <td>Rp 3.000</td>
                                <td>3</td>
                                <td>Rp9.000</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="Editkasir.php">edit</a>
                                    <a class="btn btn-danger btn-sm" href="Delete.php">delete</a>
                                </td>
                            </tr>
                        </tbody>
                        <!-- Kolom Total Transaksi -->
                        <tr class="text-center">
                            <th colspan="5" scope="col">Total Transaksi</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th id="totalTransaksi" scope="col">Rp 0</th>
                            <th scope="col"></th>
                        </tr>
                    </table>

                </tfoot>
            </table>
        </div>

        <script>
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
        </script>





        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>