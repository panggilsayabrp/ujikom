<?php
require 'function.php';

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

$id = $_GET["id"];
$outlet = queryData("SELECT * FROM tb_outlet WHERE id ='$id'")[0];

if (isset($_POST['edit'])) {
    if (editOutlet($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');
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
    <h2>Edit Outlet</h2>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $outlet['id']?>">

        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $outlet['nama']?>" required>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= $outlet['alamat']?>"

        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" id="telepon" value="<?= $outlet['tlp']?>" required>

        <button type="submit" name="edit">Edit Data</button>
    </form>
</body>
</html>
