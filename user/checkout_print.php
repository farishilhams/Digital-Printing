<?php 
include "../asset/db/koneksi.php";
$id_print = $_GET["idkp"];

$print = query("SELECT * FROM keranjang_print WHERE id_kp = $id_print")[0];

$all_va = query("SELECT * FROM tb_bank");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/checkout.css">
    <title>PEMILIHAN METODE PEMBAYARAN</title>
</head>
<body>
    <header>
        <h1>Pilih Metode Pembayaran</h1>
    </header>
    <div class="container">
        <form action="bayar_print.php" method="POST">
            <input type="hidden">
            <table>
                <tr>
                    <td><label for="tanggal_transaksi">Tanggal Pemesanan : </label></td>
                    <td><input type="text" readonly value="<?= date("Y-m-d") ?>"></td>
                </tr>
                <tr>
                    <td><label for="total_transaksi">Total Bayar : </label></td>
                    <td><input type="text" name="total_transaksi" readonly value="<?= formatHarga($print["total_print"]) ?>"></td>
                    <input type="hidden" name="tt_transaksi" readonly value="<?= $print["total_print"] ?>">
                </tr>
                <tr>
                    <td><label for="metode_pembayaran">Metode Pembayaran : </label></td>
                    <td>
                        <select name="metode_pembayaran" id="metode_pembayaran">
                            <option value="" disabled selected>PILIH METODE PEMBAYARAN</option>
                            <?php foreach ($all_va as $va) : ?>
                                <option value="<?= $va["nama_bank"] ?>"><?= $va["nama_bank"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="submit" class="bayar">Lanjutkan Pembayaran</button>
        </form>
    </div>
</body>
</html>