<?php 
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$id = $_GET["id"];

$promo = query("SELECT * FROM tb_promo WHERE id_promo = $id")[0];
$allpromo = query("SELECT * FROM tb_promo ORDER BY tanggal_promo DESC");
$outlet = query("SELECT * FROM tb_cabang");

if (isset($_POST["submit"])){
    if (isset($_SESSION["id_user"])){
        $result = claim($_POST);
        
        if ($result > 0) : ?>
            <script>
                alert('Promo Berhasil Di Claim');
            </script>
        <?php else : ?>
            <script>
                alert('Promo Sudah Di Claim');
            </script>
        <?php endif;
    }else{ ?>
        <script>
            alert('Silahkan Login Dulu untuk Claim');
        </script>
    <?php 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-wrap pt-0">
                            <div class="header">
                                <div class="post-thumb h-100">
                                    <img src="<?= $promo["img_promo"] ?>" alt="" style="width: 50%; height: auto;margin-left:150px">

                                </div>
                            </div>
                            <h1 class="post-tittle"><?= $promo["nama_promo"] ?></h1>
                            <div class="post-meta">
                                <div class="post-date ml-2">
                                    <span class="icon mr-1">
                                        <span class="far fa-clock"></span>
                                    </span>
                                    <a href=""><?= $promo["tanggal_promo"] ?></a>
                                </div>
                            </div>
                            <div class="post-content">
                                <p><?= $promo["keterangan_promo"] ?></p>
                                <form action="" method="post">
                                <?php 
                                if ($promo["harga_promo"] != 0){
                                ?>
                                    <input type="hidden" name="claim" value="<?= $promo["harga_promo"] ?>">
                                    <button type="submit" name="submit" class="btn btn-orange float-right">Claim Promo</button>
                                <?php 
                                }
                                ?>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget">
                            <!-- Widget Promo -->
                            <div class="widget-box">
                                <h4 class="widget-title">Recent Promo</h4>
                                <!-- <div class="divider"></div> -->
                                
                                <?php 
                                $counter = 0;
                                foreach ($allpromo as $pr) {
                                    if ($counter < 3){
                                ?>

                                    <div class="blog-item">
                                        <a class="post-thumb" href="display_promo.php?id=<?= $pr["id_promo"] ?>">
                                            <img class="w-100" src="<?= $pr["img_promo"] ?>" alt="PROMO BOTOL TUMBLER AKHIR TAHUN!">
                                        </a>
                                        <div class="content p-0">
                                            <h6 class="post-title"><a href="display_promo.php?id=<?= $pr["id_promo"] ?>"><?= $pr["nama_promo"] ?></a></h6>
                                            <div class="meta">
                                                <a href="#"><span class="mai-calendar"></span><?= $pr["tanggal_promo"] ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $counter++;
                                        }?>
                                <?php }?>
                                    
                                <h6 class="text-right"><a href="promo.php"> More Promo &gt;&gt;</a></h6>
                            </div>

                        <!-- Widget News -->
                        

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