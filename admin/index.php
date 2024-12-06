<?php 
include "../asset/db/koneksi.php";

if(!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}

$level = $_SESSION["level"];
$nama = $_SESSION["username_admin"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <header>
        <h1>Selamat Datang <?= $nama ?></h1>
    </header>


    <nav>
        <a href="index.php">Dashboard</a>
        <a href="logout.php">Logout</a>
        <?php 
        if ($level == 1) {
        ?>
            <a href="desain.php">Lihat Desain</a>
        <?php 
        }else{
        ?>
            <a href="pelanggan.php">Konfirmasi Barang</a>
            <a href="pel_desain.php">Konfirmasi Desain</a>
            <a href="supplier.php">Konfirmasi Supplier</a>
            <a href="loker.php">Konfirmasi Loker</a>
            <a href="show_barang.php">Tambah Barang</a>
            <a href="show_promo.php">Tambah Promo</a>
            <a href="loker.php">Loker</a>
            <a href="refund.php">Refund Dana</a>
            <a href="service.php">Service</a>
        <?php }?>
    </nav>

    <section>
        <h3><a href="pelanggan.php">Konfirmasi Pelanggan</a></h3>
    </section>

    <footer>
        <?php ?>
        &copy; <?php echo date("Y"); ?> Admin Panel
    </footer>
</body>
</html>
