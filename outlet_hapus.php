<?php

require 'function.php';

$id = $_GET["id"];

if (hapusOutlet($id) > 0) {
    echo "
            <script>
                alert('Berhasil Hapus data');
                document.location.href = 'outlet.php';
            </script>
        ";
} else {
    echo "
            <script>
                alert('Berhasil Hapus data');
                document.location.href = 'outlet.php';
            </script>
        ";
}
