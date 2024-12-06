<?php
include "../asset/db/koneksi.php";

$iduser = $_SESSION["id_user"];

$print = query("SELECT * FROM keranjang_print WHERE id_user = $iduser");

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
    
    <h2 class="product-title" align="center">Keranjang Print</h2>

    <div class="container">
        <?php if (!empty($print)) {?>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Desain</th>
                    <th>Jenis Desain</th>
                    <th>Ukuran</th>
                    <th>Kualitas</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                $no = 1;
                foreach ($print as $pr) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td>
                            <?php 
                            if ($pr["jenis_desain"] == "Print"){
                            ?>
                            <img src="../asset/img/file.png" alt="" style="height:100%; width:150px;">
                            <?= $pr["img_print"] ?>
                            <?php }else{?>
                            <img src="<?= $pr["img_print"] ?>" alt="" style="height:100%; width:150px;">
                            <?= $pr["nama_desain"] ?>
                            <?php }?>
                        </td>
                        <td><?= $pr["jenis_desain"] ?></td>
                        <td><?= $pr["ukuran_print"] ?></td>
                        <td><?= $pr["kualitas_print"] ?></td>
                        <td><?= $pr["qty_print"] ?></td>
                        <td><?= formatHarga($pr["total_print"]) ?></td>
                    </tr>
                <?php } ?>
            </table>
    
            <div class="checkout">
                <p>Total : <?= formatHarga($pr["total_print"]) ?></p>
                <a href="checkout_print.php?idkp=<?= $pr["id_kp"] ?>">Checkout</a>
            </div>
        <?php }else{ ?>
            <h3>Belum ada produk di keranjang kamu</h3>
        <?php } ?>
    </div>
</body>
</html>
