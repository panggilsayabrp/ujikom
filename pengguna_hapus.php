<?php
require 'function.php';

$id = $_GET["id"];

if (hapusPengguna($id) > 0) {
    echo "
            <script>
                alert('Berhasil Hapus data');
                document.location.href = 'pengguna.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Berhasil Hapus data');
                document.location.href = 'pengguna.php';
            </script>
        ";
}
