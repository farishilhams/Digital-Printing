<?php 
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";;
$outlet = query("SELECT * FROM tb_cabang");

$batas = 3;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$datapromo = query("SELECT * FROM tb_promo LIMIT $halaman_awal, $batas");
$total_halaman = ceil(count(query("SELECT * FROM tb_promo")) / $batas);

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
                    foreach ($datapromo as $pr) {
                    ?>
                    <div class="row mb-4">
                        <div class="col-lg-6 py-3">
                            <div class="img-place text-center">
                                <a href="">
                                    <img src="<?= $pr["img_promo"] ?>" alt="" style="width: 80%; height: auto;">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 py-3">
                            <h4 class="tittle-section">
                                <?= $pr["nama_promo"] ?>
                            </h4>
                            <small><?= $pr["tanggal_promo"] ?></small>
                            <p class="text-justify my-2">
                                <?= $pr["keterangan_promo"] ?>
                            </p>
                            <a href="display_promo.php?id=<?= $pr["id_promo"] ?>" class="btn btn-orange float-right">More Details</a>
                        </div>
                    </div>
                    <?php }?>
                    <div>
                        <ul class="page">
                            <?php if ($previous > 0) : ?>
                                <li class="pag"><a href="?halaman=<?= $previous ?>&batas=<?= $batas ?>">Prev</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                <li <?= $i == $halaman ? "class='active'" : "" ?>><a href="?halaman=<?= $i ?>&batas=<?= $batas ?>" style="color:black"><?= $i ?></a></li>
                            <?php endfor; ?>

                            <?php if ($next <= $total_halaman) : ?>
                                <li class="pag"><a href="?halaman=<?= $next ?>&batas=<?= $batas ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
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