<?php
require 'function.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
}

if (isset($_POST['logout'])) {
    session_destroy();
    echo "
            <script>
                alert('Logout Berhasil');
                document.location.href = 'login.php';
            </script>
        ";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laundry App</title>
    <style>
        .menu {
            display: inline
        }
        a {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Laundry App</h1>
    <div class="menu">
        <a href="outlet.php">Outlet</a>
        <a href="pengguna.php">Pengguna</a>
        <a href="paket.php">Paket Cucian</a>
        <a href="member.php">Member Laundry</a>
        <a href="transaksi.php">Transaksi</a>
    </div>

    <br>
    <br>

    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>