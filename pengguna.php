<?php
require 'function.php';
global $db;

$outlet = allOutlet("SELECT * FROM tb_outlet");
$query = allUser("SELECT tb_user. *, tb_outlet.nama AS nama_outlet FROM tb_user INNER JOIN tb_outlet ON tb_user.id_outlet = tb_outlet.id");


if (isset($_POST['tambah'])) {
    if (tambahUser($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Tambah data');
                document.location.href = 'pengguna.php'
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
    <h2>Tambah Pengguna</h2>
    <form action="" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" id="nama" required>


        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>


        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <label for="outlet">Outlet</label>

        <select name="outlet" id="outlet">
            <?php foreach ($outlet as $rows) : ?>
                <option value="<?= $rows['id']?>"><?= $rows['nama']?></option>
            <?php endforeach; ?>
        </select>


        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
            <option value="owner">Owner</option>
        </select>

        <button type="submit" name="tambah">Tambah Data</button>
    </form>

    <br>
    <br>

    <table border="1">
        <thead>
            <tr>
                <td>Nama</td>
                <td>Username</td>
                <td>Outlet</td>
                <td>Role</td>
                <th>Aksi Delete</th>
                <th>Aksi Update</th>
            </tr>
        </thead>

        <?php foreach ($query as $data): ?>
        <tbody>
            <tr>
                <td><?= $data['nama']?></td>
                <td><?= $data['username']?></td>
                <td><?= $data['nama_outlet']?></td>
                <td><?= $data['role']?></td>
                <td><a href="pengguna_hapus.php?id=<?= $data['id']?>" onclick="return confirm('Are you sure you want to Delete ?')">Delete</a></td>
                <td><a href="pengguna_ubah.php?id=<?= $data['id']?>">Update</a></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

</body>
</html>
