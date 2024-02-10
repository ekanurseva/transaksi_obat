<?php
require_once 'function.php';
// validasi_admin();

if (isset($_GET['id'])) {
    $idobat = $_GET['id'];

    if (hapus_obat($idobat) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='Main.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='Main.php';
                </script>
            ";
    }
}
?>