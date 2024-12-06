<?php 
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$databarang = query("SELECT * FROM tb_barang");

if (isset($_POST["cari"])) {
    $databarang = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/brg.css">
    <title>Display Produk</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="input-group" style="margin-top:40px">
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari...">
                <div class="input-group-append">
                    <button type="submit" name="cari" class="btn btn-outline-secondary" style="width:150px; " >
                        cari
                    </button>
                </div>
            </div>
        </form>
            <button class="btn btn-outline-secondary" style="width:280px;margin-top:40px " >
                <a href="kategori.php">Cari berdasarkan Kategori</a>
            </button>
        <h2 class="product-title">Product</h2>
            <?php

            $counter = 0;
            foreach ($databarang as $brg) {
                if ($counter % 5 == 0) {
                    echo '<div class="row">';
                }?>
            <div class="product">
                <a href="display_item.php?id=<?= $brg["id_barang"] ?>">
                    <img src="<?= $brg["img_barang"] ?>" alt="">
                    <p class="product-name"><?= $brg["nama_barang"] ?></p>
                    <p class="product-price"><?= formatHarga($brg["harga_satuan"]) ?></p>
                    <p class="product-stock">Stok: <?= $brg["stok"] ?></p>
                </a>
            </div>
            <?php $counter++;
                if ($counter % 5 == 0) {
                    echo '</div>';
                }
            }?>
    </div>
<div class="inc">
    <?php include "../asset/layout/footer.php";?>
</div>


</body>
</html>
