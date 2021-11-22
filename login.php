<?php
require 'function.php';

if (isset($_POST['login'])) {
    penggunaLogin($_POST);
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
    <h2>Silahkan Login</h2>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <br>

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>