<?php

$db = mysqli_connect("localhost", "root", "", "mencoba_ukk");

//Get all outlet data
function allOutlet($query): array
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//Query Data
function queryData($query): array
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//Tambah Data User
function tambahUser($data): int|string
{

    global $db;

    $nama = $data['nama'];
    $username = $data['username'];
    $password = mysqli_real_escape_string($db, $data['password']);
    $outlet = $data['outlet'];
    $role = $data['role'];

    $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO tb_user VALUES ('','$nama','$username','$password_encrypted','$outlet','$role')");

    return mysqli_affected_rows($db);
}

//Query User
function allUser($query): array
{
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//Update User
function updateUser($data): int|string
{
    global $db;

    $id = $data['id'];
    $nama = $data['nama'];
    $username = $data['username'];
    $password = mysqli_real_escape_string($db, $data['password']);
    $role = $data['role'];

    $encrypt = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE tb_user SET
                nama = '$nama',
                username = '$username',
                password = '$encrypt',
                role = '$role'
                WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

//Delete User
function hapusPengguna($id): int|string
{
    global $db;
    mysqli_query($db, "DELETE FROM tb_user WHERE id = '$id'");
    return mysqli_affected_rows($db);
}

//Create data outlet
function createOutlet($data): int|string
{
    global $db;

    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $telp = $data['telp'];

    mysqli_query($db, "INSERT INTO tb_outlet VALUES ('','$nama','$alamat','$telp')");

    return mysqli_affected_rows($db);
}

//hapus Outlet
function hapusOutlet($id): int|string
{
    global $db;
    mysqli_query($db, "DELETE FROM tb_outlet WHERE id = '$id'");
    return mysqli_affected_rows($db);
}

//Edit Outlet
function editOutlet($data): int|string
{
    global $db;

    $id = $data['id'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];

    $query = "UPDATE tb_outlet SET
                nama = '$nama',
                alamat = '$alamat',
                tlp = '$telepon'
                WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//User Login
function penggunaLogin($data) {
    global $db;

    $username = $data['username'];
    $password = mysqli_real_escape_string($db, $data['password']);

    $result = mysqli_query($db, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_num_rows($result)) {
        $rows = mysqli_fetch_array($result);

        if (password_verify($password, $rows['password'])) {
            session_start();

            $session = $_SESSION['login'] = true;

            if ($rows['role'] == 'admin' && $session) {
                header('Location: index.php');
                exit;
            } else if ($rows['role'] == 'kasir' && $session) {
                header('Location: kasir.php');
                exit;
            } else if ($rows['role'] == 'owner' && $session) {
                header('Location: owner.php');
                exit;
            }
        } else {
            echo "
            <script>
                alert('Password Salah');
            </script>
        ";
        }

    } else {
        echo "
            <script>
                alert('Username tidak tersedia');
            </script>
        ";
    }
}

//Tambah Paket
function tambahPaket($data): int|string
{
    global $db;

    $id_outlet = $data['id_outlet'];
    $paket = $data['paket'];
    $nama_paket = $data['nama_paket'];
    $harga_paket = $data['harga_paket'];

    mysqli_query($db, "INSERT INTO tb_paket VALUES ('','$id_outlet','$paket','$nama_paket','$harga_paket')");

    return mysqli_affected_rows($db);
}

//Hapus Paket
function hapusPaket($id): int|string
{
    global $db;
    mysqli_query($db, "DELETE FROM tb_paket WHERE id = '$id'");
    return mysqli_affected_rows($db);
}

function ubahPaket($data): int|string
{
    global $db;

    $id = $data['id'];
    $paket = $data['paket'];
    $nama_paket = $data['nama_paket'];
    $harga_paket = $data['harga_paket'];

    $query = "UPDATE tb_paket SET
                jenis = '$paket',
                nama_paket = '$nama_paket',
                harga = '$harga_paket'
                WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambahMember($data): int|string
{
    global $db;

    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $tlp = $data['tlp'];

    mysqli_query($db, "INSERT INTO tb_member VALUES ('','$nama','$alamat','$jenis_kelamin','$tlp')");

    return mysqli_affected_rows($db);
}

function ubahMember($data): int|string
{
    global $db;

    $id = $data['id'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis_kelamin'];
    $tlp = $data['tlp'];

    $query = "UPDATE tb_member SET 
                nama = '$nama',
                alamat = '$alamat',
                jenis_kelamin = '$jenis_kelamin',
                tlp = '$tlp'
                WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusMember($id): int|string
{
    global $db;
    mysqli_query($db,"DELETE FROM tb_member WHERE id = '$id'");
    return mysqli_affected_rows($db);
}

function tambahTransaksi($data) {
    global $db;

    $invoice = $data['invoice'];
    $outlet = $data['outlet'];
    $member = $data['member'];
    $tgl = $data['tgl'];
    $batas_waktu = $data['batas_waktu'];
    $tgl_bayar = $data['tgl_bayar'];
    $biaya_tambahan = $data['biaya_tambahan'];
    $diskon = $data['diskon'];
    $pajak = $data['pajak'];
    $status = $data['status'];
    $dibayar = $data['dibayar'];
    $id_user = $data['id_user'];

    $query = "INSERT INTO tb_transaksi VALUES 
               ('','$outlet','$invoice','$member',
                '$tgl','$batas_waktu','$tgl_bayar',
                '$biaya_tambahan','$diskon','$pajak',
                '$status','$dibayar','$id_user')";

    mysqli_query($db,$query);

    return mysqli_affected_rows($db);
}

function tambahCucian($data): int|string
{
    global $db;

    $id = $data['id_trx'];
    $paket_cucian = $data['paket_cucian'];
    $qty = $data['qty'];
    $keterangan = $data['keterangan'];

    mysqli_query($db, "INSERT INTO tb_detail_transaksi VALUES ('','$id','$paket_cucian','$qty', '$keterangan')");

    return mysqli_affected_rows($db);
}