<?php 
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/brg.css">
    <title>KATEGORI PRODUK</title>
    
</head>
<body>

<div class="container">
    
    <select id="menuDropdown" style="color: red; margin:20px;padding:10px; text-align:center; border-radius: 20px; border-color: red;">
        <option value="#">---------- PILIH KATEGORI ------------</option>
        <option value="#buku">BUKU</option>
        <option value="#alat_tulis">ALAT TULIS</option>
        <option value="#eraser">ERASER</option>
        <option value="#lain-lain">LAIN - LAIN</option>
    </select>

    <div id="buku-container" class="category-container">
        <h2 class="product-title" id="buku" style="color: darkblue;">BUKU</h2>
        <?php
        $buku = query("SELECT * FROM tb_barang WHERE kategori = 'buku'");
        $counter = 0;
        foreach ($buku as $book) {
            if ($counter % 5 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="product">
                <a href="display_item.php?id=<?= $book["id_barang"] ?>">
                    <img src="<?= $book["img_barang"] ?>" alt="">
                    <p class="product-name"><?= $book["nama_barang"] ?></p>
                    <p class="product-price"><?= formatHarga($book["harga_satuan"]) ?></p>
                    <p class="product-stock">Stok: <?= $book["stok"] ?></p>
                </a>
            </div>
            <?php
            $counter++;
            if ($counter % 5 == 0) {
                echo '</div>';
            }
        }
        ?>
    </div>

    <div id="alat_tulis-container" class="category-container">
        <h2 class="product-title" id="alat_tulis" style="color: darkblue;">ALAT TULIS</h2>
        <?php
        $alat_tulis = query("SELECT * FROM tb_barang WHERE kategori = 'alat_tulis'");
        $counter = 0;
        foreach ($alat_tulis as $tulis) {
            if ($counter % 5 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="product">
                <a href="display_item.php?id=<?= $tulis["id_barang"] ?>">
                    <img src="<?= $tulis["img_barang"] ?>" alt="">
                    <p class="product-name"><?= $tulis["nama_barang"] ?></p>
                    <p class="product-price"><?= formatHarga($tulis["harga_satuan"]) ?></p>
                    <p class="product-stock">Stok: <?= $tulis["stok"] ?></p>
                </a>
            </div>
            <?php
            $counter++;
            if ($counter % 5 == 0) {
                echo '</div>';
            }
        }
        ?>
    </div>

    <div id="eraser-container" class="category-container">
        <h2 class="product-title" id="eraser" style="color: darkblue;">ERASER</h2>
        <?php
        $eraser = query("SELECT * FROM tb_barang WHERE kategori = 'eraser'");
        $counter = 0;
        foreach ($eraser as $hapus) {
            if ($counter % 5 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="product">
                <a href="display_item.php?id=<?= $hapus["id_barang"] ?>">
                    <img src="<?= $hapus["img_barang"] ?>" alt="">
                    <p class="product-name"><?= $hapus["nama_barang"] ?></p>
                    <p class="product-price"><?= formatHarga($hapus["harga_satuan"]) ?></p>
                    <p class="product-stock">Stok: <?= $hapus["stok"] ?></p>
                </a>
            </div>
            <?php
            $counter++;
            if ($counter % 5 == 0) {
                echo '</div>';
            }
        }
        ?>
    </div>
    <div id="lain-lain-container" class="category-container">    
        <h2 class="product-title" id="lain-lain" style="color: darkblue;">LAIN - LAIN</h2>
        <?php
        $lain = query("SELECT * FROM tb_barang WHERE kategori = 'lain-lain'");
        $counter = 0;
        foreach ($lain as $etc) {
            if ($counter % 5 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="product">
                <a href="display_item.php?id=<?= $etc["id_barang"] ?>">
                    <img src="<?= $etc["img_barang"] ?>" alt="">
                    <p class="product-name"><?= $etc["nama_barang"] ?></p>
                    <p class="product-price"><?= formatHarga($etc["harga_satuan"]) ?></p>
                    <p class="product-stock">Stok: <?= $etc["stok"] ?></p>
                </a>
            </div>
            <?php
            $counter++;
            if ($counter % 5 == 0) {
                echo '</div>';
            }
        }
        ?>
    </div>
</div>

    <script>
    document.getElementById('menuDropdown').addEventListener('change', function() {
        var selectedValue = this.value;
        window.location.href = selectedValue;
    });
    </script>

</body>
</html>