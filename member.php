<?php
require 'function.php';

$query = queryData("SELECT * FROM tb_member");

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
    <h2>Daftar Member Laundry</h2>
    <a href="tambah_member.php">Tambah Member</a>
    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Jenis Kelamin</td>
                <td>Telepon</td>
                <td>Aksi Ubah</td>
                <td>Aksi Hapus</td>
            </tr>
        </thead>

        <?php foreach($query as $row): ?>
        <tbody>
            <tr>
                <td><?= $row['nama']?></td>
                <td><?= $row['alamat']?></td>
                <td><?= $row['jenis_kelamin']?></td>
                <td><?= $row['tlp']?></td>
                <td><a href="ubah_member.php?id=<?= $row['id']?>">Ubah</a></td>
                <td><a href="hapus_member.php?id=<?= $row['id']?>" onclick="return confirm('Are you sure you want to delete this member ?')">Hapus</a></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
</body>
</html>
