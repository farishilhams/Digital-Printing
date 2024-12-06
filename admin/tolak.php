<?php
include "../asset/db/koneksi.php";

$id = $_GET["id"];

if (delete_sup($id) > 0) : ?>
    <script>
        alert('Supplier Tertolak');
        window.location.href = 'supplier.php';
    </script>";
<?php else : ?>
    <script>
        alert('Data gagal dihapus');
        window.location.href = 'supplier.php';
    </script>";
<?php endif; ?>