<?php
require_once 'vendor/autoload.php'; // Mengimpor DomPDF
require_once 'function.php';

$id_transaksi = dekripsi($_GET['id']);
$data_user = getUser();
$data_detail = query("SELECT * FROM detail_transaksi WHERE transaksi_idtransaksi = $id_transaksi");

$data_transaksi = query("SELECT * FROM transaksi WHERE idtransaksi = $id_transaksi")[0];
$tanggal = date('d F Y | H:i:s', strtotime($data_transaksi['tanggal']));


use Dompdf\Dompdf;

// Membuat objek Dompdf
$dompdf = new Dompdf();

// Konten HTML yang akan diubah menjadi PDF
$html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>STRUK</title>

            <style>
                        table {
                            border-collapse: collapse;
                            width: 100%;
                        }

                        th, td {
                            border: 1px solid black;
                            padding: 8px;
                            text-align: center;
                            vertical-align: start;
                            font-size: 15px;
                        }

                        th {
                            background-color: #f2f2f2;
                        }

                        p {
                            text-align: justify; 
                            text-indent: 0.3in;
                            font-size: 14px;
                        }
                        li {
                            text-align: justify;
                            padding: 0;
                            padding: 0;
                            margin: 0;
                            left: 0;
                            font-size: 14px;
                        }
                    </style>
        </head>
        <body>
            <h2 style="margin: 0;">"APOTEK 99"</h2>
            <h4 style="margin: 0;">Apotek 99 Kemantren</h4>
            <h4 style="margin: 0;">Jl. Pangeran Cakrabuana, Kelurahan Kemantren</h4>
            <h4 style="margin: 0;">Kec. Sumber, Kab. Cirebon, Jawa Barat 45611</h4>
            
            <h4 style="margin: 0; text-align: right;">Kemantren, ';
$html .= $tanggal . '</h4>

            <h4 style="margin-top: 7px">No Nota. ';
$html .= $data_transaksi['kode_transaksi'] . '<h4>

            <table>
            <tr>
                <th>NO</th>
                <th>NAMA OBAT</th>
                <th>QTY</th>
                <th>JUMLAH</th>
            </tr>';
$i = 1;
$total = 0;
foreach ($data_detail as $detail) {
    $id_obat = $detail['obat_idobat'];
    $total += $detail['subtotal'];
    $data_obat = query("SELECT * FROM obat WHERE idobat = $id_obat")[0];
    $html .= '<tr>
                        <td>' . $i . '</td>
                        <td>' . $data_obat['nama_obat'] . '</td>
                        <td>' . $detail['qty'] . '</td>
                        <td>Rp ' . number_format($detail['subtotal'], 0, ',', '.') . '</td>
                    </tr>';
    $i++;
}

$html .= '<tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <th style="text-align: right">TOTAL </th>
                <th>Rp ' . number_format($total, 0, ',', '.') . '</th>
            </tr>
            </table>

            <br>
            <h4 style="font-style: italic; margin: 0">Terima Kasih</h4>
            <h4 style="font-style: italic; margin: 0">Semoga Lekas Sembuh</h4>

            <h4 style="font-weight: bold;">Apoteker,</h4><br>
            <h4 style="font-weight: bold; margin: 0;">Dr. Dwi Affay Rosulmaulana</h4>

        </body>
        </html>';

// Memasukkan konten HTML ke Dompdf
$dompdf->loadHtml($html);

// Merender PDF (mengubah HTML menjadi PDF)
$dompdf->render();

// Ambil output PDF
$output = $dompdf->output();

// Konversi output PDF menjadi data URI
$pdfDataUri = 'data:application/pdf;base64,' . base64_encode($output);

// Tampilkan pratinjau PDF di browser
echo '<embed src="' . $pdfDataUri . '" type="application/pdf" width="100%" height="100%">';

?>