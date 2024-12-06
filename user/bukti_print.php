<?php 
include "../asset/db/koneksi.php";



$iduser = $_SESSION["id_user"];

$keranjang = query("SELECT * FROM keranjang_print WHERE id_user = $iduser");

$id_kp = query("SELECT id_kp FROM keranjang_print WHERE id_user = $iduser")[0];

$id_transaksi = $_GET["id"];

var_dump($id_kp);

$bayar = query("SELECT * FROM tb_transaksi_print WHERE id_tp = $id_transaksi")[0];
if (isset($_POST["submit"])) {
    $result = bukti_tp($_POST);
    $add = adddetail_tp($_POST);
    $hapus = deletekp($id_kp["id_kp"]);
    
    if ($result > 0) : ?>
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = 'pembayaran_print.php';
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
    <link rel="stylesheet" href="../asset/css/bukti.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id_tp" value="<?= $bayar["id_tp"];?>">
        <input type="hidden" name="id_kp" value="<?= $id_kp["id_kp"] ?>">
        <table>
            <?php foreach ($keranjang as $cart){?>
            
                <input type="hidden" name="jenis" value="<?= $cart["jenis_desain"] ?>">
                <input type="hidden" name="ukuran" value="<?= $cart["ukuran_print"] ?>">
                <input type="hidden" name="qty" value="<?= $cart["qty_print"] ?>">
                <input type="hidden" name="img" value="<?= $cart["img_print"] ?>">
                <input type="hidden" name="quality" value="<?= $cart["kualitas_print"] ?>">
            
            <?php }?>
            <tr>
                <td><label for="tgl">Tanggal Transaksi : </label></td>
                <td><?= $bayar["tgl_tp"] ?></td>
            </tr>
            <tr>
                <td><label for="status">Status Transaksi : </label></td>
                <td><?= $bayar["status_tp"] ?></td>
                <input type="hidden" name="status" value="Sedang Diproses">
            </tr>
            <tr>
                <td><label for="metode">Metode Pembayaran : </label></td>
                <td><?= $bayar["metode_tp"] ?></td>
            </tr>
            <tr>
                <td><label for="total">Total Transaksi : </label></td>
                <td><?= formatHarga($bayar["total_tp"]) ?></td>
            </tr>
            <tr>
                <td><label for="bukti">Bukti Pembayaran : </label></td>
                <td><input type="text" name="bukti_tp"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>