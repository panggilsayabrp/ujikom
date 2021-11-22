<?php
require 'function.php';

$id = $_GET['id'];

if (hapusMember($id) > 0) {
    echo "
            <script>
                alert('Berhasil Hapus data');
                document.location.href = 'member.php';
            </script>
        ";
}