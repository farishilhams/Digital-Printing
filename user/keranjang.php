<?php
include "../asset/db/koneksi.php";

$iduser = $_SESSION["id_user"];

$keranjang = query("SELECT k.*, b.nama_barang, b.harga_satuan FROM keranjang k 
                    JOIN tb_barang b ON k.id_barang = b.id_barang 
                    WHERE k.id_user = $iduser");

$user = query("SELECT * FROM tb_user WHERE id_user = $iduser")[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/keranjang.css">
    <title>Shopping Cart</title>
</head>
<body>
    <?php 
    include "../asset/layout/navbar_ns.php";
    ?>
    
    <h2 class="product-title" align="center">Keranjang</h2>

    <div class="container">
        <?php if (!empty($keranjang)) {
            $total = query("SELECT total_harga FROM keranjang WHERE id_user = $iduser")[0];
        ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no = 1;
                $totalharga = 0;
                $totalbarang = 0;
                foreach ($keranjang as $cart) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $cart["nama_barang"] ?></td>
                        <td><?= formatHarga($cart["harga_satuan"]) ?></td>
                        <td><?= $cart["qty"] ?></td>
                        <td><?= formatHarga($cart["total_harga"]) ?></td>
                        <td><a href="hapus_ker.php?id=<?= $cart["id_keranjang"] ?>">Hapus</a></td>
                    </tr>
                    <?php
                    $totalharga += $cart["total_harga"];
                    $totalbarang += $cart["qty"];
                } 
                if (!empty($user["claim"])){
                    $hitung = $totalharga * $user["claim"]/100;
                    $promo = $totalharga - $hitung;
                }
                // var_dump($hitung);
                ?>
            </table>
                
        <div class="checkout">
            <?php if(empty($user["claim"])){?>
                <p>Total  (<?= $totalbarang ?> item): <?= formatHarga($totalharga)?></p>
            <?php }else{?>
                <p>Promo Terpakai : <?= formatHarga($hitung) ?>. Total  (<?= $totalbarang ?> item): <?= formatHarga($promo)?></p>
            <?php }?>
            <a href="checkout.php">Checkout</a>
        </div>
        <?php } else { ?>
            <h3>Belum ada produk di keranjang kamu</h3>
        <?php } ?>
        
    </div>
    
</body>
</html>
