<?php
require 'function.php';

$outlet = queryData("SELECT id FROM tb_outlet")[0];

if (isset($_POST['tambah'])) {
    if (tambahPaket($_POST) > 0) {
        echo "
            <script>
                alert('Tambah Data Berhasil');
                document.location.href = 'paket.php';
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
    <h2>Tambah Paket Cucian</h2>
    <form action="" method="post">

        <input type="hidden" name="id_outlet" value="<?= $outlet['id']?>">

        <label for="paket">Paket Cucian</label>
        <select name="paket" id="paket">
            <option value="kiloan">Kiloan</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
            <option value="kaos">Kaos</option>
            <option value="lain">Lainnya</option>
        </select>
        <br>
        <br>

        <label for="nama_paket">Nama Paket</label>
        <input type="text" id="nama_paket" name="nama_paket" required>
        <br>
        <br>

        <label for="harga_paket">Harga Paket</label>
        <input type="number" id="harga_paket" name="harga_paket" required>
        <br>
        <br>

        <button type="submit" name="tambah">Tambah Data</button>
    </form>
</body>
</html>
