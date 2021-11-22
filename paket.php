<?php
require 'function.php';

$paket = queryData("SELECT * FROM tb_paket");


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
    <h2>Paket Cucian</h2>
    <a href="tambah_paket.php">Tambah Paket Cucian</a>
    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <td>Jenis</td>
                <td>Nama Paket</td>
                <td>Harga</td>
                <td>Aksi Edit</td>
                <td>Aksi Hapus</td>
        </thead>

        <?php foreach($paket as $row): ?>
        <tbody>
            <tr>
                <td><?= $row['jenis']?></td>
                <td><?= $row['nama_paket']?></td>
                <td>Rp.<?= $row['harga']?></td>
                <td><a href="ubah_paket.php?id=<?= $row['id']?>">Edit Paket</a></td>
                <td><a href="hapus_paket.php?id=<?= $row['id']?>" onclick="return confirm('Are you sure you want to delete this')">Hapus Paket</a></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</body>
</html>