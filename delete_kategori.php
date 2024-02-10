<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (hapus_kategori($id) > 0) {
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