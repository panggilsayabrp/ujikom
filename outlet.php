<?php
require 'function.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

//Ambil Data Outlet
$outlet = allOutlet("SELECT * FROM tb_outlet");


//Tambah Data
if (isset($_POST['tambah'])) {
    if (createOutlet($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Tambah data');
                document.location.href = 'outlet.php';
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
    <h2>Tambah Outlet Laundry</h2>

    <form action="" method="post">
        <label for="nama">Nama Outlet</label>
        <input type="text" name="nama" id="nama" required>


        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" required>


        <label for="telp">No Telepon</label>
        <input type="number" name="telp" id="telp"  required>


        <button type="submit" name="tambah">Tambah</button>
    </form>

    <table border="1">
        <thead>
        <tr>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Telepon</td>
            <th>Aksi Update</th>
            <th>Aksi Delete</th>
        </tr>
        </thead>

        <?php foreach ($outlet as $data): ?>
            <tbody>
            <tr>
                <td><?= $data['nama']?></td>
                <td><?= $data['alamat']?></td>
                <td><?= $data['tlp']?></td>
                <td><a href="outlet_hapus.php?id=<?= $data['id']?>" onclick="return confirm('Are you sure you want to Delete ?')">Delete</a></td>
                <td><a href="outlet_ubah.php?id=<?= $data['id']?>">Update</a></td>
            </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</body>
</html>
