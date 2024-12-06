<?php 
include "../asset/db/koneksi.php";
$iduser = $_SESSION["id_user"];

$keranjang = query("SELECT k.*, b.harga_satuan FROM keranjang k 
                    JOIN tb_barang b ON k.id_barang = b.id_barang 
                    WHERE k.id_user = $iduser");
$total = query("SELECT total_harga FROM keranjang WHERE id_user = $iduser")[0];
$user = query("SELECT * FROM tb_user WHERE id_user = $iduser")[0];
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
        <form action="bayar.php" method="POST">
            <input type="hidden">
            <table>
                <tr>
                    <td><label for="tanggal_transaksi">Tanggal Pemesanan : </label></td>
                    <td><input type="text" readonly value="<?= date("Y-m-d") ?>"></td>
                </tr>
                <?php 
                $no = 1;
                $totalharga = 0;
                $totalbarang = 0;
                foreach ($keranjang as $cart){?>
                <input type="hidden" name="id_keranjang" id="id_keranjang" value="<?= $cart["id_keranjang"] ?>">
                
                <?php 
                $totalharga += $cart["total_harga"];
                $totalbarang += $cart["qty"];
                    if (!empty($user["claim"])){
                        $hitung = $totalharga * $user["claim"]/100;
                        $promo = $totalharga - $hitung;
                    }
                }
                ?>
                <tr>
                    <td><label for="total_transaksi">Total Bayar : </label></td>
                    <?php 
                    if (empty($user["claim"])){
                    ?>
                        <td><input type="text" name="total_transaksi" readonly value="<?= formatHarga($totalharga) ?>"></td>
                        <input type="hidden" name="tt_transaksi" readonly value="<?= $totalharga ?>">
                    <?php }else{?>
                        <td><input type="text" name="total_transaksi" readonly value="<?= formatHarga($promo) ?>"></td>
                        <input type="hidden" name="tt_transaksi" readonly value="<?= $promo ?>">
                    <?php }?>
                </tr>
                <tr>
                    <td><label for="metode_pembayaran">Metode Pembayaran : </label></td>
                    <td>
                        <select name="metode_pembayaran" id="metode_pembayaran" required>
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