<?php
require_once 'function.php';
$transaksi = query("SELECT * FROM transaksi ORDER BY tanggal ASC");

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan-transaksi-excel.xls");

?>
<p align="center" style="font-weight:bold;font-size:16pt">LAPORAN TRANSAKSI PENJUALAN</p>

<style>
    table {
        text-align: center;
    }

    td {
        vertical-align: middle;
        text-align: center;
    }
</style>

<table border="1" style="text-align: center;">
    <tr>
        <th width="50">No</th>
        <th width="250">Tanggal</th>
        <th width="270">Nama Obat</th>
        <th width="80">Jumlah</th>
        <th width="100">Harga</th>
        <th width="100">Total</th>
        <th width="150">Total Transaksi</th>
    </tr>
    <?php
    $i = 1;
    foreach ($transaksi as $trans):
        $idtransaksi = $trans['idtransaksi'];
        $data_detail = query("SELECT * FROM detail_transaksi WHERE transaksi_idtransaksi = $idtransaksi");

        $total = 0; foreach ($data_detail as $datail) {
            $total += $datail['subtotal'];
        }

        $idobat1 = $data_detail[0]['obat_idobat'];

        $data_obat1 = query("SELECT * FROM obat WHERE idobat = $idobat1")[0];

        $jumlah_detail = count($data_detail);

        $tanggal = date('d/m/Y | H:i:s', strtotime($trans['tanggal']));
        ?>
        <tr>
            <td rowspan="<?= $jumlah_detail; ?>"><?= $i; ?></td>
            <td rowspan="<?= $jumlah_detail; ?>"><?= $tanggal; ?></td>
            <td>
                <?= $data_obat1['nama_obat']; ?>
            </td>
            <td style="text-align: center;">
                <?= $data_detail[0]['qty']; ?>
            </td>
            <td style="text-align: right;">
                <?= number_format($data_obat1['harga'], 0, ',', '.'); ?>
            </td>
            <td style="text-align: right;">
                <?= number_format($data_detail[0]['subtotal'], 0, ',', '.'); ?>
            </td>
            <td rowspan="<?= $jumlah_detail; ?>"><?= number_format($total, 0, ',', '.');
              ; ?>
            </td>
        </tr>
        <?php
        if ($jumlah_detail > 1):
            for ($j = 1; $j < $jumlah_detail; $j++):
                $idobat = $data_detail[$j]['obat_idobat'];

                $data_obat = query("SELECT * FROM obat WHERE idobat = $idobat")[0];
                ?>
                <tr>
                    <td>
                        <?= $data_obat['nama_obat']; ?>
                    </td>
                    <td style="text-align: center;">
                        <?= $data_detail[$j]['qty']; ?>
                    </td>
                    <td style="text-align: right;">
                        <?= number_format($data_obat['harga'], 0, ',', '.'); ?>
                    </td>
                    <td style="text-align: right;">
                        <?= number_format($data_detail[$j]['subtotal'], 0, ',', '.'); ?>
                    </td>
                </tr>

                <?php
            endfor;
        endif;
        $i++;
    endforeach;
    ?>
</table>

<p align="center">
    <input type="button" value="Export Excel" onclick="window.open('laporan-transaksi-excel.php')">
</p>