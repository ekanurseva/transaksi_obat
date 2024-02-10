<?php
require_once 'function.php';
// validasi_admin();

if (isset($_GET['id'])) {
    $iduser = $_GET['id'];

    if (hapus_pengguna($iduser) > 0) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus');
                    document.location.href='user.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Dihapus');
                    document.location.href='user.php';
                </script>
            ";
    }
}
?>