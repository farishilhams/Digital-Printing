<?php 
include "../asset/db/koneksi.php";

$id = $_SESSION["id_user"];
$byr = query("SELECT * FROM tb_transaksi WHERE id_user = $id");
include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/transaksi.css">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Tanggal</th>
            <th>Metode Pembayaran</th>
            <th>Total Transaksi</th>
            <th>Status Transaksi</th>
            <th>Konfirmasi Transaksi</th>
            <th>Aksi</th>
        </tr>
        <?php 
        if (!empty($byr)){
            foreach ($byr as $b){
        ?>
        
        <tr>
            <td><?= $b["tanggal_transaksi"] ?></td>
            <td><?= $b["metode_pembayaran"] ?></td>
            <td><?= formatHarga($b["total_transaksi"]) ?></td>
            <td><?= $b["status_transaksi"] ?></td>
            <?php if ($b["konfirmasi_transaksi"] == NULL){?>
                <td>Belum Terkonfirmasi</td>
            <?php }else{?>
            <td><?= $b["konfirmasi_transaksi"] ?></td>
            <?php }?>
            <td>
            <?php if ($b["bukti_pembayaran"] == NULL){?>
                <a href="bukti.php?id=<?= $b["id_transaksi"] ?>">kirim bukti</a>
            <?php }elseif($b["status_transaksi"] == "Sedang Diproses"){?>
                Menunggu
            <?php }else{?>
                <a href="detail_pembayaran.php?id=<?= $b["id_transaksi"] ?>">Lihat Detail</a>
                <a href="refund_dana.php?id=<?= $b["id_transaksi"] ?>">Refund</a>
            </td>
            <?php }?>
            
        </tr>
            <?php }?>
        <?php }else{?>
            <tr>
                <td colspan="6">Belum Melakukan Pembayaran Apapun. Yuk cek produk di Printz.id : <a href="display.php" class="lht">Lihat</a></td>
            </tr>
        <?php }?>
    </table>
    <?php 
    include "../asset/layout/footer.php";
    ?>
</body>
</html>