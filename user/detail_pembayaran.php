<?php
include "../asset/db/koneksi.php";

$id = $_GET["id"];

$detail = query("SELECT dtb.*, tb.nama_barang, tb.img_barang
                FROM detail_transaksi_barang dtb
                JOIN tb_barang tb ON dtb.id_barang = tb.id_barang 
                WHERE dtb.id_transaksi = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/keranjang.css">
    <title>Detail</title>
</head>
<body>
    <?php 
    include "../asset/layout/navbar_ns.php";
    ?>
    
    <h2 class="product-title" align="center">Detail Transaksi</h2>

    <div class="container">
        <?php if (!empty($detail)) {
        ?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                <?php
                $no = 1;
                $totalharga = 0;
                foreach ($detail as $dt) { 
                    $sub = $dt["harga_satuan"] * $dt["qty"];
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><img src="<?= $dt["img_barang"] ?>" alt="" style="width: 20%; height: auto; margin:20px"> <?= $dt["nama_barang"] ?></td>
                        <td><?= formatHarga($dt["harga_satuan"]) ?></td>
                        <td><?= $dt["qty"] ?></td>
                        <td><?= $sub ?></td>
                    </tr>
                    <?php
                    
                } ?>
            </table>
    
        
        <?php } else { ?>
            <h3>Belum ada produk di keranjang kamu</h3>
        <?php } ?>
        
    </div>

    <?php 
    include "../asset/layout/footer.php";
    ?>
</body>
</html>
