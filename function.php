<?php

$koneksi = mysqli_connect("localhost", "root", "", "dataobat");
if (mysqli_connect_errno()) {
    echo "Gagal Koneksi" . mysqli_connect_error();
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function jumlah_data($data)
{
    global $koneksi;
    $query = mysqli_query($koneksi, $data);

    $jumlah_data = mysqli_num_rows($query);

    return $jumlah_data;
}

function dekripsi($teks)
{
    $text = $teks;
    $kunci = 'DataObat';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $dekripsi = base64_decode($text);
    $dekripsi = openssl_decrypt($dekripsi, $method, $key, 0, $iv);

    return $dekripsi;
}
function enkripsi($teks)
{
    $text = $teks;
    $kunci = 'DataObat';
    $key = hash('sha256', $kunci);
    $pkey = "123";

    $method = "aes-192-cfb1";
    $iv = substr(hash('sha256', $pkey), 0, 16);

    $enkripsi = openssl_encrypt($text, $method, $key, 0, $iv);
    $enkripsi = base64_encode($enkripsi);

    return $enkripsi;
}

// CRUD PENGGGUNA
function register($data_user)
{
    global $koneksi;
    $username = strtolower(stripslashes($data_user["username"]));
    $password = mysqli_escape_string($koneksi, $data_user["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data_user["password2"]);
    $nama = $data_user["nama"];
    $email = $data_user["email"];
    $level = "kasir";

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = 'username'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Digunakan');
        </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai');
        </script>";
        return false;
    }
    $password = password_hash($password2, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$nama', '$email', '$username', '$password', '$level')");

    return mysqli_affected_rows($koneksi);
}

function register_pengguna($data_user)
{
    global $koneksi;
    $username = strtolower(stripslashes($data_user["username"]));
    $password = mysqli_escape_string($koneksi, $data_user["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data_user["password2"]);
    $nama = $data_user["nama"];
    $email = $data_user["email"];
    $level = $data_user['level'];

    $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = 'username'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username Sudah Digunakan');
        </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
        alert('Password Tidak Sesuai');
        </script>";
        return false;
    }
    $password = password_hash($password2, PASSWORD_DEFAULT);

    mysqli_query($koneksi, "INSERT INTO user VALUES (NULL, '$nama', '$email', '$username', '$password', '$level')");

    return mysqli_affected_rows($koneksi);
}

function update($data)
{
    global $koneksi;

    $id = $data['iduser'];
    $oldusername = $data['oldusername'];
    $oldpassword = $data['oldpassword'];
    $oldemail = $data['oldemail'];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
    $nama = $data["nama"];
    $email = $data["email"];
    $level = $data["level"];

    if (isset($data['oldlevel'])) {
        $level = $data['oldlevel'];
    } else {
        $level = $data['level'];
    }

    if ($username !== $oldusername) {
        $result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Username Sudah Dipakai!');
            </script>";
            return false;
        }
    }

    if ($password !== $oldpassword) {
        if ($password !== $password2) {
            echo "<script>
                    alert('Password Tidak Sesuai!');
                  </script>";
            return false;
        }

        $password = password_hash($password2, PASSWORD_DEFAULT);
    }

    if ($email !== $oldemail) {
        $result = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Email sudah digunakan, silahkan pakai email lain');
                  </script>";
            return false;
        }
    }

    $query = "UPDATE user SET 
        nama = '$nama',
        email = '$email',
        username = '$username',
        password = '$password',
        level = '$level'
    WHERE iduser = '$id'
    ";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_pengguna($iduser)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM user WHERE iduser = $iduser");

    return mysqli_affected_rows($koneksi);
}
// CRUD PENGGUNA

// CRUD OBAT
function input_obat($data)
{
    global $koneksi;
    $kodeobat = $data["kodeobat"];
    $namaobat = $data["namaobat"];
    $deskripsi = $data["deskripsi"];
    $dosis = $data["dosis"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $expired = $data["expired"];
    $kemasan = $data["kemasan"];
    $kategori = $data["kategori"];

    $result = mysqli_query($koneksi, "SELECT nama_obat FROM obat WHERE nama_obat = 'namaobat'") or die(mysqli_error($koneksi));
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Nama Obat Sudah Ada');
        </script>";
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO obat VALUES (NULL, '$kodeobat', '$namaobat','$deskripsi','$dosis','$harga','$stok','$expired','$kemasan','$kategori')");

    return mysqli_affected_rows($koneksi);
}

function edit_obat($data)
{
    global $koneksi;
    $id = $data["idobat"];
    $oldobat = $data["oldobat"];
    $kodeobat = $data["kodeobat"];
    $namaobat = $data["namaobat"];
    $deskripsi = $data["deskripsi"];
    $dosis = $data["dosis"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $expired = $data["expired"];
    $kemasan = $data["kemasan"];
    $kategori = $data["kategori"];

    if ($oldobat !== $namaobat) {
        $result = mysqli_query($koneksi, "SELECT nama_obat FROM obat WHERE nama_obat = '$namaobat'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                alert('Data obat sudah ada');
            </script>";
            return false;
        }
    }

    $query = "UPDATE obat SET kode_obat = '$kodeobat',
        nama_obat = '$namaobat',
        deskripsi = '$deskripsi',
        dosis = '$dosis',
        harga = '$harga',
        stok = '$stok',
        expired = '$expired',
        kemasan = '$kemasan',
        kategori = '$kategori'
    WHERE idobat = '$id'";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus_obat($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM obat WHERE idobat = $id");

    return mysqli_affected_rows($koneksi);
}
// CRUD OBAT SELESAI



// CRUD TRANSAKSI
function cek_transaksi()
{
    global $conn;
    if (!isset($_GET['key'])) {
        echo "<script>
                document.location.href='Maintransaksi.php';
            </script>";
        exit;
    }

    $id = dekripsi($_GET['key']);

    $result = mysqli_query($conn, "SELECT * FROM transaksi WHERE kode_transaksi = '$id'");

    if ($result == false) {
        echo "<script>
                document.location.href='Maintransaksi.php';
            </script>";
        exit;
    }
}


function input_transaksi($data)
{
    global $conn;

    $id = dekripsi($_COOKIE['DataObat']);
    $user = query("SELECT * FROM user WHERE iduser = $id")[0];

    if (!isset($data['obat'])) {
        echo "
            <script>
                alert('Harap isi obat terlebih dahulu');
            </script>
        ";

        if ($user['level'] === "admin") {
            echo "
                <script>
                    document.location.href='Maintransaksi.php';
                </script>
            ";
        } elseif ($user['level'] === "kasir") {
            echo "
                <script>
                    document.location.href='Main.php';
                </script>
            ";
        }
    } else {
        $obat = $data['obat'];
        $iduser = $data['iduser'];
        $kode_transaksi = $data['kode_transaksi'];

        for ($i = 0; $i < count($obat); $i++) {
            $query = "INSERT INTO transaksi
                    VALUES
                    (NULL, '$iduser', '$obat[$i]', NULL, '$kode_transaksi', CURRENT_TIMESTAMP())";
            // var_dump($query);
            mysqli_query($conn, $query);
        }

        return mysqli_affected_rows($conn);
    }
}

function getKodeTransaksi()
{

    $query = "SELECT * FROM transaksi";
    $kode = "";

    $jumlah = jumlah_data($query);
    $tanggal = date("Ymd");

    if ($jumlah == 0) {
        $kode = "T-" . $tanggal . "-1";
    } else {
        for ($i = 1; $i <= $jumlah; $i++) {
            $kode_transaksi = "T-" . $tanggal . "-" . $i;
            $totalP = jumlah_data("SELECT * FROM transaksi WHERE kode_transaksi = '$kode_transaksi'");

            if ($totalP == 0) {
                $kode = "T-" . $tanggal . "-" . $i;
                break;
            } else {
                $angka = $jumlah + 1;
                $kode = "T-" . $tanggal . "-" . $angka;
            }
        }
        ;
    }

    return $kode;
}

function getUser()
{
    if (isset($_COOKIE['DataObat'])) {
        $iduser = dekripsi($_COOKIE['DataObat']);
        $data_user = query("SELECT * FROM user WHERE iduser = $iduser")[0];

    } else {
        echo "
            <script>
                document.location.href='logout.php';
            </script>
        ";
    }

    return $data_user;
}

function doTransaksi($data)
{
    global $koneksi;

    $kode_transaksi = htmlspecialchars($data['kode_transaksi']);

    $data_obat = query("SELECT * FROM obat");

    $iduser = dekripsi($_COOKIE['DataObat']);

    $cek_0 = 0;
    foreach ($data_obat as $daob) {
        if ($data[$daob['kode_obat']] != 0) {
            if ($daob['stok'] < $data[$daob['kode_obat']]) {
                echo "
                    <script>
                        alert('Stok untuk " . $daob['nama_obat'] . " tersisa " . $daob['stok'] . ", sedangkan yang diminta " . $data[$daob['kode_obat']] . "');
                        document.location.href='transaksi_detail.php';
                    </script>
                ";
                exit();
            }
            $cek_0++;
        }
    }

    if ($cek_0 == 0) {
        echo "
            <script>
                alert('Harap mengisi jumlah, minimal untuk 1 obat');
                document.location.href='transaksi_detail.php';
            </script>
        ";
        exit();
    }

    mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, CURRENT_TIMESTAMP(), '$kode_transaksi', '$iduser')");

    $data_transaksi = query("SELECT * FROM transaksi WHERE kode_transaksi = '$kode_transaksi'")[0];
    $id_transaksi = $data_transaksi['idtransaksi'];

    $berhasil = 0;
    foreach ($data_obat as $dabat) {
        if ($data[$dabat['kode_obat']] != 0) {
            $id_obat = $dabat['idobat'];
            $harga = $dabat['harga'];
            $qty = $data[$dabat['kode_obat']];
            $subtotal = $qty * $harga;

            $stok = $dabat['stok'] - $qty;

            mysqli_query($koneksi, "INSERT INTO detail_transaksi VALUES (NULL, '$qty', '$subtotal', '$id_transaksi', '$id_obat')");

            $query = "UPDATE obat SET 
                stok = '$stok'
            WHERE idobat = '$id_obat'";
            mysqli_query($koneksi, $query);

            $berhasil++;
        }
    }

    return $berhasil;
}

function edit_detail_transaksi($data)
{
    global $koneksi;

    $iddetail_transaksi = htmlspecialchars($data['iddetail_transaksi']);
    $obat_idobat = htmlspecialchars($data['obat_idobat']);
    $oldqty = htmlspecialchars($data['oldqty']);
    $qty = htmlspecialchars($data['qty']);
    $berhasil = 0;

    if ($qty == "" || $qty == 0) {
        echo "
            <script>
                alert('Qty tidak boleh kosong atau 0');
                document.location.href='Editdetailadmin.php?id=" . enkripsi($iddetail_transaksi) . "';
            </script>
        ";
        exit();
    }

    $data_obat = query("SELECT * FROM obat WHERE idobat = $obat_idobat")[0];

    $qty_total = $oldqty + $data_obat['stok'];

    if ($qty > $qty_total) {
        echo "
            <script>
                alert('Stok untuk " . $data_obat['nama_obat'] . " tersisa " . $qty_total . ", sedangkan yang diminta " . $qty . "');
                document.location.href='Editdetailadmin.php?id=" . enkripsi($iddetail_transaksi) . "';
            </script>
        ";
        exit();
    }

    $subtotal = $qty * $data_obat['harga'];
    $stok = $qty_total - $qty;

    $query = "UPDATE obat SET 
                stok = '$stok'
              WHERE idobat = '$obat_idobat'";
    mysqli_query($koneksi, $query);

    $berhasil++;

    $query = "UPDATE detail_transaksi SET 
                qty = '$qty',
                subtotal = '$subtotal'
              WHERE iddetail_transaksi = '$iddetail_transaksi'";
    mysqli_query($koneksi, $query);

    $berhasil++;

    return $berhasil;
}