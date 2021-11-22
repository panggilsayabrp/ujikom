<?php
require 'function.php';
$id = $_GET['id'];
$user = allUser("SELECT * FROM tb_user WHERE id = $id")[0];

if (isset($_POST['ubah'])) {
    if (updateUser($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Tambah data');
                document.location.href = 'pengguna.php';
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
    <h2>Ubah Pengguna</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $user['id']?>">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" value="<?= $user['nama']?>" required>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $user['username']?>" required>

<!--        <label for="password">Password</label>-->
<!--        <input type="password" name="password" id="password">-->

        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="admin" <?= $user['role'] != 'admin' ?: 'selected'?>>Admin</option>
            <option value="kasir" <?= $user['role'] != 'kasir' ?: 'selected'?>>Kasir</option>
            <option value="owner" <?= $user['role'] != 'owner' ?: 'selected'?>>Owner</option>
        </select>

        <button type="submit" name="ubah">Ubah Data</button>
    </form>
</body>
</html>