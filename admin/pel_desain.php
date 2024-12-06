<?php 
include "../asset/db/koneksi.php";

$nama = $_SESSION["username_admin"];

$dataPelanggan = query("SELECT * 
                        FROM tb_transaksi_print
                        JOIN tb_user ON tb_transaksi_print.id_user = tb_user.id_user");

if (isset($_POST["submit"])) {
    $result = konfir($_POST);
    
    if ($result > 0) : ?>
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = 'pelanggan.php';
        </script>
    <?php else : ?>
        <script>
            alert('Data Gagal diubah');
        </script>
    <?php endif;
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin_pel.css">
    <link rel="stylesheet" href="../asset/css/admin.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Selamat Datang <?= $nama ?></h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="pelanggan.php">Konfirmasi Pelanggan</a>
        <a href="logout.php">Logout</a>
    </nav>
    <table border="1" align="center">
        <tr>
            <th>Nama Pelanggan</th>
            <th>Tanggal Transaksi</th>
            <th>Metode Pembayaran</th>
            <th>Total Transaksi</th>
            <th>Bukti Pembayaran</th>
            <th>Status Transaksi</th>
            <th>Konfirmasi</th>
        </tr>
        <?php 
        foreach ($dataPelanggan as $pel) {
            
        ?>
        <tr>
            <td><?= $pel["username"] ?></td>
            <td><?= $pel["tgl_tp"] ?></td>
            <td><?= $pel["metode_tp"] ?></td>
            <td><?= formatHarga($pel["total_tp"]) ?></td>
            <td><?= $pel["bukti_tp"] ?></td>
            <td><?= $pel["status_tp"] ?></td>
            <?php if ($pel["status_tp"] == 'belum bayar'){?>
                <td>--</td>
            <?php }elseif ($pel["confirm_tp"] == NULL){?>
                <td><a href="konf_desain.php?id_tp=<?= $pel["id_tp"] ?>">konfirmasi</a></td>
            <?php }else{?>
                <td><?= $pel["confirm_tp"] ?></td>
            <?php }?>
        </tr>
        <?php     
        }
        ?>
    </table>
</body>
</html>