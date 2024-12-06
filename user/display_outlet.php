<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id"];
$cabang = query("SELECT * FROM tb_cabang WHERE id_cabang = $id")[0];
$promo = query("SELECT * FROM tb_promo ORDER BY tanggal_promo DESC");
$outlet = query("SELECT * FROM tb_cabang");


include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://snapy.co.id/assets/assets_branch/css/theme.css"> -->

</head>
<body>
<main>
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="page-section py-3">
                        <div class="container">
                            <h2 class="subhead">Digital Printing Printz.id Cabang <?= $cabang["cabang"] ?> </h2>
                            <hr class="mb-1">
                            <hr class="mt-1">
                            <div class="row">
                                <div class="col-lg-6 py-3">
                                    <div class="img-place text-center">
                                        <img src="<?= $cabang["img"] ?>" alt="cabang_10">
                                    </div>
                                </div>
                                <div class="col-lg-6 py-3">
                                    <ul class="metasingle">
                                        <li class="blog_map"><?= $cabang["alamat_cabang"] ?></li>
                                        <li class="blog_phone">Telp : <?= $cabang["telp_cabang"] ?></li>
                                        <li class="blog_wa">Whatsapp : <?= $cabang["telp_cabang"] ?></li>
                                    </ul>

                                </div>
                            </div>
                        </div> 
                    </div> 
                        <!-- .page-section -->
                        <div class="page-section py-3">
                            <div class="container">
                                <div style="overflow-x:auto;">
                                    <table class="table table-striped table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Day</th>
                                                <th>Open</th>
                                                <th>Close</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Monday</th>
                                                <th>07:00</th>
                                                <th>22:00</th>
                                            </tr>
                                            <tr>
                                                <th>Tuesday</th>
                                                <th>07:00</th>
                                                <th>22:00</th>
                                            </tr>
                                            <tr>
                                                <th>Wednesday</th>
                                                <th>07:00</th>
                                                <th>22:00</th>
                                            </tr>
                                            <tr>
                                                <th>Thursday</th>
                                                <th>07:00</th>
                                                <th>22:00</th>
                                            </tr>
                                            <tr>
                                                <th>Friday</th>
                                                <th>07:00</th>
                                                <th>22:00</th>
                                            </tr>
                                            <tr>
                                                <th>Saturday</th>
                                                <th>10:00</th>
                                                <th>19:00</th>
                                            </tr>
                                            <tr>
                                                <th>Sunday</th>
                                                <th>10:00</th>
                                                <th>19:00</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- .container -->
                        </div> <!-- .page-section -->

                        <div class="page-section py-2">
                            <div class="container">
                                <div class="responsive-map">
                                    <?php if ($cabang["id_cabang"] == 1){?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d494.874771417893!2d112.72854606863099!3d-7.126206452926088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701440423229!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <?php }elseif ($cabang["id_cabang"] == 2){?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1949.8698316975958!2d112.76186270302016!3d-7.040006572012066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701612027859!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <?php }elseif ($cabang["id_cabang"] == 3){?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1563.7396326839514!2d112.772492992487!3d-7.1610675379427295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701612165875!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <?php }elseif ($cabang["id_cabang"] == 4){?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3370.7266558157316!2d112.77665022833365!3d-7.247286115906983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701612204884!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <?php }elseif ($cabang["id_cabang"] == 5){?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d978.939028900432!2d112.72779232790052!3d-7.389919177838282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1701612248895!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <?php }elseif ($cabang["id_cabang"] == 6){?>

                                    <?php }?>
                                </div>
                                
                                <blockquote class="my-5">
                                    <p>Terletak di lokasi strategis, cabang Printz.id <?= $cabang["cabang"] ?> hadir untuk memenuhi kebutuhan karyawan, mahasiswa, dan pelajar. Layanan kami terfokus pada print dokumen, cetak banner, dan stiker. Dengan fasilitas percetakan terlengkap, kami siap membantu kebutuhan bisnis pribadi, perusahaan, hingga peralatan promosi yang meliputi banner dan stiker.</p>
                                    <p>Mencetak berbagai keperluan pada media kertas dan tekstil, membuat aplikasi bisnis dan promosi, mencetak foto di berbagai media, Anda juga bisa mencetak di media besar seperti giant banner.</p>
                                    <p>Digital printing Printz.id juga menyediakan tempat tunggu yang nyaman. Sehingga pelanggan lebih leluasa dan tidak merasa risih ketika menunggu hasil print maupun antrian. Berbagai mesin canggih yang Printz.id miliki memberikan hasil cetak yang maksimal dan sangat memuaskan.</p>
                                    <p>Anda tidak perlu khawatir jika tidak bisa desain, Printz.id menyediakan layanan jasa desain atau hanya sekedar edit desain yang sudah Anda miliki. </p>
                                    
                                    <p>So…yuk datang ke Outlet kami... kami akan memberikan layanan yang terbaik untuk Anda.</p>
                                    
                                </blockquote>
                            </div> <!-- .container -->
                        </div> <!-- .page-section -->


                    </div>
                <!-- Sidebar Widget -->
                        <div class="col-lg-4">
                            <div class="widget">
                                <!-- Widget Promo -->
                                <div class="widget-box">
                                    <h4 class="widget-title">Recent Promo</h4>
                                    <!-- <div class="divider"></div> -->
                                    
                                    <?php 
                                    $counter = 0;
                                    foreach ($promo as $pr) {
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
<?php include "../asset/layout/footer.php";?>
</body>
</html>