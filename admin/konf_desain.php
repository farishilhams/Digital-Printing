<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id_tp"];
$konfir = query("SELECT * FROM tb_transaksi_print WHERE id_tp = $id")[0];
if (isset($_POST["confirm_tp"])) {
    $konf = konfir_desain($_POST);
    
    if ($konf > 0) : ?>
        <script>
            alert('Transaksi Berhasil Dikonfirmasi');
            window.location.href = 'pel_desain.php';
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
    <input type="hidden" name="id_tp" value="<?= $konfir["id_tp"];?>">
        <table>
            <tr>
                <td><label for="tgl">Tanggal Transaksi : </label></td>
                <td><?= $konfir["tgl_tp"] ?></td>
            </tr>
            <tr>
                <td><label for="status">Status Transaksi : </label></td>
                <td><?= $konfir["status_tp"] ?></td>
                <input type="hidden" name="status_tp" value="Selesai">
            </tr>
            <tr>
                <td><label for="metode">Metode Pembayaran : </label></td>
                <td><?= $konfir["metode_tp"] ?></td>
            </tr>
            <tr>
                <td><label for="total">Total Transaksi : </label></td>
                <td><?= formatHarga($konfir["total_tp"]) ?></td>
            </tr>
            <tr>
                <td><label for="bukti">Bukti Pembayaran : </label></td>
                <td><?= $konfir["bukti_tp"] ?></td>
            </tr>
        </table>
        <button type="submit" name="confirm_tp" value="Terkonfirmasi">Konfirmasi Transaksi</button>
    </form>
</body>
</html>