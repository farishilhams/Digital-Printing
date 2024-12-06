<?php 
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$cabang = query("SELECT * FROM tb_cabang"); 


if (isset($_POST["cari"])) {
    $cabang = cari_cabang($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/outlet.css">
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
        <h2 class="product-title">Cabang</h2>
        <?php

        $counter = 0;
        foreach ($cabang as $cb) {
            if ($counter % 4 == 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="product">
                <a href="display_outlet.php?id=<?= $cb["id_cabang"] ?>">
                    <img src="<?= $cb["img"] ?>" alt="">
                    <p class="product-name"><?= $cb["alamat_cabang"] ?></p>
                    <p class="product-price"><?= $cb["kabupaten"] ?></p>
                    <p class="product-stock">Telp: <?= $cb["telp_cabang"] ?></p>
                </a>
            </div>
            <?php 
            $counter++;
            if ($counter % 4 == 0) {
                echo '</div>';
            }
        }
        ?>
    </div>

<div class="inc">
    <?php include "../asset/layout/footer.php";?>
</div>

</body>
</html>
