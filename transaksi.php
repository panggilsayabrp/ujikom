<?php
require 'function.php';

$query = queryData("SELECT tb_transaksi. *, tb_member.nama FROM tb_transaksi INNER JOIN tb_member ON tb_transaksi.id_member = tb_member.id");

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
    <h2>Transaksi Laundry</h2>
    <a href="tambah_transaksi.php">Tambah Transaksi</a>

    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pembayaran</th>
                <th>Member</th>
                <th>Status</th>
                <th>Aksi Detail</th>
                <th>Aksi Edit</th>
            </tr>
        </thead>

        <?php foreach($query as $row_transaksi): ?>
        <tbody>
            <tr>
                <td><?= $row_transaksi['kode_invoice']?></td>
                <td><?= $row_transaksi['tgl']?></td>
                <td><?= $row_transaksi['dibayar']?></td>
                <td><?= $row_transaksi['nama']?></td>
                <td><?= $row_transaksi['status']?></td>
                <td><a href="detail_transaksi.php?id=<?= $row_transaksi['id']?>">Detail Transaksi</a></td>
            </tr>
        </tbody>
        <?php endforeach;?>
    </table>
</body>
</html>
