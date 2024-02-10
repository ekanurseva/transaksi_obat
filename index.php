<?php
include("function.php");

if (isset($_COOKIE['DataObat'])) {
    echo "<script>
                document.location.href='login.php';
              </script>";
    exit;
} else {
    echo "<script>
                document.location.href='logout.php';
              </script>";
    exit;
}
?>