<?php 
include "../asset/db/koneksi.php";



$iduser = $_SESSION["id_user"];

$keranjang = query("SELECT k.*, b.harga_satuan FROM keranjang k 
                    JOIN tb_barang b ON k.id_barang = b.id_barang 
                    WHERE k.id_user = $iduser");

$id_transaksi = $_GET["id"];


$bayar = query("SELECT * FROM tb_transaksi WHERE id_transaksi = $id_transaksi")[0];
if (isset($_POST["submit"])) {
    $result = bukti($_POST);
    $hapus = deletekeranjang($iduser);
    $add = adddetail($_POST);
    $del = del_prom($_POST);
    
    if ($result > 0) : ?>
        <script>
            alert('Data berhasil ditambahkan');
            window.location.href = 'pembayaran.php';
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
        <input type="hidden" name="id_transaksi" value="<?= $bayar["id_transaksi"];?>">
        <input type="hidden" name="claim" value="0">
        <input type="hidden" name="id" value="<?= $iduser ?>">
        <table>
            <?php foreach ($keranjang as $cart){?>
            
                <input type="hidden" name="id_barang[]" value="<?= $cart["id_barang"] ?>">
                <input type="hidden" name="harga_satuan[]" value="<?= $cart["harga_satuan"] ?>">
                <input type="hidden" name="qty[]" value="<?= $cart["qty"] ?>">
            
            <?php }?>
            <tr>
                <td><label for="tgl">Tanggal Transaksi : </label></td>
                <td><?= $bayar["tanggal_transaksi"] ?></td>
            </tr>
            <tr>
                <td><label for="status">Status Transaksi : </label></td>
                <td><?= $bayar["status_transaksi"] ?></td>
                <input type="hidden" name="status" value="Sedang Diproses">
            </tr>
            <tr>
                <td><label for="metode">Metode Pembayaran : </label></td>
                <td><?= $bayar["metode_pembayaran"] ?></td>
            </tr>
            <tr>
                <td><label for="total">Total Transaksi : </label></td>
                <td><?= formatHarga($bayar["total_transaksi"]) ?></td>
            </tr>
            <tr>
                <td><label for="bukti">Bukti Pembayaran : </label></td>
                <td><input type="file" name="bukti_pembayaran"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>