<?php
require 'function.php';

$id = $_GET['id'];
$query = queryData("SELECT * FROM tb_member WHERE id='$id'")[0];

if (isset($_POST['edit'])) {
    if (ubahMember($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Mengubah Data');
                document.location.href = 'member.php';
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
    <h2>Ubah Data Member</h2>
    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $query['id']?>">

        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="<?= $query['nama']?>" required>
        <br>
        <br>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= $query['alamat']?>" required>
        <br>
        <br>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L" <?= $query['jenis_kelamin'] != 'L' ?: 'selected'?>>Laki Laki</option>
            <option value="P" <?= $query['jenis_kelamin'] != 'P' ?: 'selected'?>>Perempuan</option>
        </select>
        <br>
        <br>

        <label for="tlp">Telepon</label>
        <input type="number" name="tlp" id="tlp" value="<?= $query['tlp']?>" required>
        <br>
        <br>

        <button type="submit" name="edit">Edit Data</button>
    </form>
</body>
</html>
