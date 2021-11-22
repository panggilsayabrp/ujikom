<?php
require 'function.php';

$member = queryData("SELECT * FROM tb_member");
$outlet = queryData("SELECT * FROM tb_outlet");
$user = queryData("SELECT * FROM tb_user");

if (isset($_POST['tambah'])) {
    if (tambahTransaksi($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Menambahkan Pengguna');
                document.location.href = 'transaksi.php';
            </script>
        ";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Transaksi</h2>
    <form action="" method="post">
        <label for="">Invoice</label>
        <input type="text" name="invoice" id="" value="INV-<?= date('Ymd-his') ?>" readonly>
        <br>
        <br>

        <label for="outlet">Pilih Outlet</label>
        <select name="outlet" id="outlet">
            <?php foreach ($outlet as $row) : ?>
                <option value="<?= $row['id']?>"><?= $row['nama']?></option>
            <?php endforeach;?>
        </select>
        <br>
        <br>

        <label for="member">Pilih Member</label>
        <select name="member" id="member">
            <?php foreach ($member as $row) : ?>
                <option value="<?= $row['id']?>"><?= $row['nama']?></option>
            <?php endforeach;?>
        </select>
        <br>
        <br>

        <label for="tgl">Tanggal</label>
        <input type="datetime-local" name="tgl" id="tgl">
        <br>
        <br>

        <label for="batas_waktu">Batas Waktu</label>
        <input type="datetime-local" name="batas_waktu" id="batas_waktu">
        <br>
        <br>

        <label for="tgl_bayar">Tanggal Bayar</label>
        <input type="datetime-local" name="tgl_bayar" id="tgl_bayar">
        <br>
        <br>

        <label for="biaya_tambahan">Biaya Tambahan</label>
        <input type="number" name="biaya_tambahan" id="biaya_tambahan">
        <br>
        <br>

        <label for="diskon">Diskon</label>
        <input type="number" name="diskon" id="diskon">
        <br>
        <br>


        <label for="pajak">Pajak</label>
        <input type="number" name="pajak" id="pajak">
        <br>
        <br>

        <label for="status">Pilih Status</label>
        <select name="status" id="status">
            <option value="baru">Baru</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
            <option value="diambil">Diambil</option>
        </select>
        <br>
        <br>

        <label for="dibayar">Dibayar</label>
        <select name="dibayar" id="dibayar">
            <option value="dibayar">Dibayar</option>
            <option value="belum_dibayar">Belum Dibayar</option>
        </select>
        <br>
        <br>

        <label for="id_user">User</label>
        <select name="id_user" id="id_user">
            <?php foreach ($user as $row) : ?>
                <option value="<?= $row['id']?>"><?= $row['role']?></option>
            <?php endforeach;?>
        </select>
        <br>
        <br>

        <button type="submit" name="tambah">Tambah Transaksi</button>
    </form>
</body>
</html>
