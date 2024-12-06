<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id_transaksi"];
$konfir = query("SELECT * FROM tb_transaksi WHERE id_transaksi = $id")[0];
if (isset($_POST["konfirmasi_transaksi"])) {
    $konf = konfir($_POST);
    
    if ($konf > 0) : ?>
        <script>
            alert('Transaksi Berhasil Dikonfirmasi');
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
    <link rel="stylesheet" href="../asset/css/admin_konf.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="hidden" name="id_transaksi" value="<?= $konfir["id_transaksi"];?>">
        <table>
            <tr>
                <td><label for="tgl">Tanggal Transaksi : </label></td>
                <td><?= $konfir["tanggal_transaksi"] ?></td>
            </tr>
            <tr>
                <td><label for="status">Status Transaksi : </label></td>
                <td><?= $konfir["status_transaksi"] ?></td>
                <input type="hidden" name="status_transaksi" value="Selesai">
            </tr>
            <tr>
                <td><label for="metode">Metode Pembayaran : </label></td>
                <td><?= $konfir["metode_pembayaran"] ?></td>
            </tr>
            <tr>
                <td><label for="total">Total Transaksi : </label></td>
                <td><?= $konfir["total_transaksi"] ?></td>
            </tr>
            <tr>
                <td><label for="bukti">Bukti Pembayaran : </label></td>
                <td><img src="<?= $konfir["bukti_pembayaran"] ?>" alt="bukti"></td>
            </tr>
        </table>
        <button type="submit" name="konfirmasi_transaksi" value="Terkonfirmasi">Konfirmasi Transaksi</button>
    </form>
</body>
</html>