<?php
require 'function.php';

$id = $_GET['id'];
$paket = queryData("SELECT * FROM tb_paket WHERE id = '$id'")[0];

if (isset($_POST['edit'])) {
    if (ubahPaket($_POST) > 0) {
        echo "
            <script>
                alert('Edit Data Berhasil');
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
    <h2>Ubah Paket</h2>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?php echo $paket['id']?>">

        <label for="paket">Paket Cucian</label>
        <select name="paket" id="paket">
            <option value="kiloan" <?= $paket['jenis'] != 'kiloan'?:'selected' ?>>Kiloan</option>
            <option value="selimut" <?= $paket['jenis'] != 'selimut'?:'selected' ?>>Selimut</option>
            <option value="bed_cover" <?= $paket['jenis'] != 'bed_cover'?:'selected' ?>>Bed Cover</option>
            <option value="kaos" <?= $paket['jenis'] != 'kaos'?:'selected' ?>>Kaos</option>
            <option value="lain" <?= $paket['jenis'] != 'lain'?:'selected' ?>>Lainnya</option>
        </select>
        <br>
        <br>

        <label for="nama_paket">Nama Paket</label>
        <input type="text" id="nama_paket" name="nama_paket" value="<?=$paket['nama_paket']?>" required>
        <br>
        <br>

        <label for="harga_paket">Harga Paket</label>
        <input type="number" id="harga_paket" name="harga_paket" value="<?=$paket['harga']?>" required>
        <br>
        <br>

        <button type="submit" name="edit">Edit Data</button>
    </form>
</body>
</html>
