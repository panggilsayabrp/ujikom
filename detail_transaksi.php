<?php
require 'function.php';

$id = $_GET['id'];
global $db;



$tes = queryData("SELECT id FROM tb_detail_transaksi");
var_dump($tes[0]['id']);

$query = queryData("SELECT tb_transaksi. *, tb_member.nama, tb_member.tlp, tb_member.alamat FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member = tb_member.id WHERE tb_transaksi.id = '$id'");
$paket_cucian = queryData("SELECT * FROM tb_paket");
$dev = queryData("SELECT tb_detail_transaksi. *, tb_paket.nama_paket, tb_paket.harga FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id");
//var_dump("SELECT tb_detail_transaksi. *, tb_paket.nama_paket, tb_paket.harga FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket = tb_paket.id INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id WHERE tb_transaksi = '$id'");


if (isset($_POST['tambah'])) {
    if (tambahCucian($_POST) > 0) {
        echo "
            <script>
                alert('Tambah Paket Cucian Berhasil');
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
    <h2>Detail Transaksi</h2>

    <h3>Member</h3>
    <?php foreach ($query as $row): ?>
    <ul>
        <li>ID : <?= $row['id']?></li>
        <li>Nama : <?= $row['nama']?></li>
        <li>Telepon : <?= $row['tlp']?></li>
        <li>Alamat : <?= $row['alamat']?></li>
    </ul>
    <?php endforeach; ?>

    <h3>Detail Transaksi</h3>
    <?php foreach ($query as $transaksi): ?>
        <ul>
            <li>Kode Invoice : <?= $transaksi['kode_invoice']?></li>
            <li>Tanggal : <?= $transaksi['tgl']?></li>
            <li>Batas Waktu : <?= $transaksi['batas_waktu']?></li>
            <li>Tanggal Bayar : <?= $transaksi['tgl_bayar']?></li>
            <li>Biaya Tambahan : Rp <?= $transaksi['biaya_tambahan']?></li>
            <li>Diskon : Rp <?= $transaksi['diskon']?></li>
            <li>Pajak : Rp <?= $transaksi['pajak']?></li>
            <li>Status : <?= $transaksi['status']?></li>
            <li>Dibayar : <?= $transaksi['dibayar']?></li>
        </ul>
    <?php endforeach; ?>

    <h2>Paket Cucian</h2>

    <form action="" method="post">

        <input type="hidden" name="id_trx" value="<?= $row['id']?>">

        <label for="paket_cucian">Paket Cucian</label>
        <select name="paket_cucian" id="paket_cucian">
            <?php foreach ($paket_cucian as $row_paket) : ?>
                <option value="<?= $row_paket['id']?>"><?= $row_paket['nama_paket']?></option>
            <?php endforeach; ?>
        </select>

        <label for="qty">QTY</label>
        <input type="number" name="qty" id="qty" required>

        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan">

        <button type="submit" name="tambah">Tambah</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <td>Nama Paket</td>
                <td>QTY</td>
                <td>Harga</td>
                <td>Total Harga</td>
                <td>Keterangan</td>
            </tr>
        </thead>

        <?php foreach($dev as $hehe) : ?>
        <tbody>
            <tr>
                <td><?= $hehe['nama_paket']?></td>
                <td><?= $hehe['harga']?></td>
                <td><?= $hehe['qty']?></td>
                <td><?= $hehe['keterangan']?></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
        <tr>
            <th>
                Total Harga
            </th>
        </tr>
    </table>
</body>
</html>