<?php 
include "../asset/db/koneksi.php";

$outlet = query("SELECT * FROM tb_cabang");
$supplier = query("SELECT * FROM tb_supplier");

include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/promo.css">
    <title>Document</title>
</head>
<body>
<main>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php 
                    foreach ($supplier as $sup) {
                    ?>
                    <div class="row mb-4">
                        <div class="col-lg-6 py-3">
                            <div class="img-place text-center">
                                <a href="">
                                    <img src="<?= $sup["img_supplier"] ?>" alt="" style="width: 80%; height: auto;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 py-3">
                            <h4 class="tittle-section">
                                <?= $sup["nama_supplier"] ?>
                            </h4>
                            <small><?= $sup["alamat_supplier"] ?></small>
                            <p class="text-justify my-2">
                            Kami dengan bangga ingin memberitahu Anda bahwa Printz.id, 
                            penyedia layanan digital printing terkemuka, 
                            telah menjalin kemitraan strategis dengan <i><b style="color:orange"><?= $sup["nama_supplier"] ?></i></b>. 
                            Keputusan ini diambil untuk memberikan kepada Anda, pelanggan setia kami, 
                            pengalaman digital printing yang lebih bermutu dan terdepan.
                            </p>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="col-lg-4">
                    <!-- Widget Outlet -->
                    <div class="widget-box">
                        <h4 class="widget-title">Outlet Printz.id</h4>
                        <?php 
                        $bts = 0;
                        foreach ($outlet as $ot) {
                            if ($bts < 3){
                        ?>
                            <div class="blog-item">
                                <div class="content py-0">
                                    <h6 class="post-title"><a href="display_outlet.php?id=<?= $ot["id_cabang"] ?>">Printz.id Cabang <?= $ot["cabang"] ?></a></h6>
                                </div>
                            </div>
                            <?php $bts++;
                            }?>
                        <?php }?> 
                            <h6 class="text-right"><a href="outlets.php"> More Outlet &gt;&gt;</a></h6>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include "../asset/layout/footer.php";
?>
</body>
</html>