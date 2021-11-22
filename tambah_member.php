<?php
require 'function.php';

if (isset($_POST['submit'])) {
    if (tambahMember($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Menambahkan Pengguna');
                document.location.href = 'member.php'
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
    <h2>Silahkan Tambah Member</h2>
    <form action="" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" required>
        <br>
        <br>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" required>
        <br>
        <br>

        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L">Laki Laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br>
        <br>

        <label for="tlp">Telepon</label>
        <input type="number" name="tlp" id="tlp" required>
        <br>
        <br>

        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>
