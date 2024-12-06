<?php 
include "../asset/db/koneksi.php";

if (isset($_SESSION['id_user']) and isset($_SESSION['nama_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama_user = $_SESSION["nama_user"];
} else {
    $id_user = null;
    $nama_user = null;
}

$databarang = query("SELECT * FROM tb_barang");
include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Printz.id</title>
  <link rel="stylesheet" href="../asset/css/home.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-css-reset@1.4.0/dist/reset.min.css" />
  <script src="../asset/js/homejs.js"></script>
</head>
<body>
  <!-- slider -->
  <div class="slider">
    <!-- radio btn start -->
    <div class="slides">
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio2">
      <input type="radio" name="radio-btn" id="radio3">
      <input type="radio" name="radio-btn" id="radio4">
      <!-- radio btn end -->
      <!-- slide image start -->
      <div class="slide first">
        <img src="../asset/img/promo.png" alt="">
      </div>
      <div class="slide">
        <img src="../asset/img/banner.jpg" alt="">
      </div>
      <div class="slide">
        <img src="../asset/img/alat.png" alt="">
      </div>
      <div class="slide">
        <img src="../asset/img/produk.jpg" alt="">
      </div>
      <!-- slide image end -->
      <!-- automatic nav start-->
      <div class="nav-auto">
        <div class="auto-btn1"></div>
        <div class="auto-btn2"></div>
        <div class="auto-btn3"></div>
        <div class="auto-btn4"></div>
      </div>
      <!-- automatic nav end -->
      </div>
      <!-- manual nav start -->
      <div class="nav-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!-- manual nav end -->
    </div>

    <!-- konten promo -->
    <div class="container-content">
      <div class="desc1">
        <img src="../asset/img/logo.png" alt="">
        <h1>Solusi Cetak Digital dan Pusat Kebutuhan Anda</h1>
        <p>Printz.id adalah sebuah usaha jasa digital printing yang menghadirkan layanan profesional 
          dalam dunia percetakan digital. Menyediakan berbagai solusi cetak, 
          Printz.id memberikan kemudahan bagi pelanggan untuk mencetak foto, dokumen, 
          serta membuat stiker dan banner dengan kualitas tinggi. Dengan fasilitas cetak dokumen yang canggih, 
          Printz.id memastikan bahwa dokumen pelanggan dicetak dengan ketelitian dan kejelasan yang optimal. 
          Baik itu dokumen bisnis, presentasi, atau dokumen pribadi, Printz.id siap memenuhi kebutuhan cetak Anda.</p>
          <div class="to-promo">
            <a href="promo.php"><input type="submit" name="checkp" id="checkp" value="Cek Promo yang Tersedia"></a>
          </div></div>
      <div class="content1">
        <img src="./images/promo JasakuID.PNG" alt="">
      </div>
    </div>

    <!-- konten deskripsi web JasakuID -->
    <div class="container-content2">
      <div class="content2">
        <img src="" alt="">
      </div>
      <div class="desc2">
        <img src="../asset/img/printing.jpg" alt="">
        <h1>Platform Digital Printing Professional dan Terpercaya</h1>
        <p>Printz.id, platform terpercaya Desain dan Print Document anda. Kami hadir untuk memenuhi kebutuhan Anda 
          dalam memperoleh Promo Besar-besaran serta menyediakan layanan Jasa Edit Desain untuk membantu membuata desain
          yang terbaik untuk anda. Dengan Printz.id, Anda dapat dengan mudah dan aman melakukan 
          pembayaran dan pembelian produk secara langsung, serta menikmati keuntungan dari jasa edit desain kami yang siap membantu Anda.
          Jadikan Printz.id sebagai mitra terbaik Anda dalam membuat desain produk anda yang luar biasa!</p>
          
      </div>
    </div>
    <!-- konten deskripsi livestream -->
    <div class="container-content3">
      <div class="desc3">
        <img src="../asset/img/banner.jpg" alt="">
        <h1>Tonton Jasa Pembuatan Produk Anda</h1>
        <p>Nikmati pengalaman menonton langsung pembuatan produk terbaik di Printz.id. Saksikan para pekerja bekerja,
          Tonton Pembuatan desain dan produk anda secara virtual. 
          Dapatkan wawasan berharga dan inspirasi, serta interaksi langsung dengan Printz.id. 
          Saksikan live stream dari Printz.id terbaik dan rasakan kegembiraan 
          dunia Digital Printing.</p>
          <div class="to-promo">
            <a href="livetime.php"><input type="submit" name="checkp" id="checkp" value="Tonton Live"></a>
          </div>
      </div>
      <div class="content3">
        <img src="./images/konten 3.png" alt="">
      </div>
    </div>

  <div class="News">
    <div class="text-center my-5">
        <h2 class="section-title px-5"><span class="px-4">Berita</span></h2>
    </div>
    <p>Penasaran dengan berita terbaru yang ada di platform kita?Yuk cek berita dibawah ini!</p>
  </div>
  <div class="container-news">
    <div class="tips1">
      <a href="loker.php">
        <div class="tips-content1">
          <img src="../asset/img/loker.png" alt="">
          <div class="desc-tips1">
            <p>Printz.id Membuka Lowongan Pekerjaan</p>
          </div>
        </div>
      </a>
    </div>
    <div class="tips1">
      <a href="form_supplier.php">
        <div class="tips-content1">
          <img src="../asset/img/kerjasama.jpg" alt="">
          <div class="desc-tips1">
            <p>Berminat Untuk Bergabung Dengan Printz.id? Segera Isi Form Berikut !</p>
          </div>
        </div>
      </a>
    </div>
    <div class="tips1">
      <a href="supplier.php">
        <div class="tips-content1">
          <img src="../asset/img/supplier.png" alt="">
          <div class="desc-tips1">
            <p>Kami Bekerja Sama Dengan Berbagai Supplier Yang Ternama Dan Professional</p>
          </div>
        </div>
      </a>
    </div>
    <div class="tips1">
      <a href="print.php">
        <div class="tips-content1">
          <img src="../asset/Images/b3.jpg" alt="">
          <div class="desc-tips1">
            <p>Lihat Beberapa Jasa Kami !!</p>
          </div>
        </div>
      </a>
    </div>
    <div class="tips1">
      <a href="displaydetailproduk.php">
        <div class="tips-content1">
          <img src="../asset/Images/sticker3.jpg" alt="">
          <div class="desc-tips1">
            <p>Lihat Detail Desain Kami !!</p>
          </div>
        </div>
      </a>
    </div>
      <!-- <div class="tips2">
        <a href="#"><div class="tips-content2">
          <img src="../asset/img/banner.jpg" alt="">
          <div class="desc-tips2"><p>3 Hero Rekomendasi Push Rank Untuk Para Solo Player Mobile Legends: Bang Bang</p></div>
      </div></a>
      </div>
      <div class="tips3">
        <a href="#"><div class="tips-content3">
          <img src="./images/hero-mlbb-push.jpeg" alt="">
          <div class="desc-tips3"><p>3 Hero Rekomendasi Push Rank Untuk Para Solo Player Mobile Legends: Bang Bang</p></div>
      </div></a>
      </div>
      <div class="tips4">
        <a href="#"><div class="tips-content4">
          <img src="./images/giveaway.jpeg" alt="">
          <div class="desc-tips4"><p>Cara Mudah Memenangkan Giveaway Diamond Free Fire Gratis Dari JasakuID</p></div>
        </div></a>
      </div> -->
  </div>

  
  <div class="News">
    <div class="text-center my-5">
        <h2 class="section-title px-5"><span class="px-4">SUGGESTED PRODUCTS</span></h2>
    </div>
    <p>Penasaran dengan Produk yang kita jual ada di printz.id? Yuk cek Produk dibawah ini!</p>
  </div>
  <div class="container-news">
      <?php
      $counter = 0;
      foreach ($databarang as $brg) {
          if ($counter < 5) {
      ?>
              <div class="tips1">
                  <a href="display_item.php?id=<?= $brg["id_barang"] ?>">
                      <div class="tips-content1">
                          <img src="<?= $brg["img_barang"] ?>" alt="">
                          <div class="desc-tips1">
                              <p align="center"><?= $brg["nama_barang"] ?></p>
                          </div>
                          <div class="desc-tips1">
                              <p align="center" style="color:#ff9326;">Harga <?= formatHarga($brg["harga_satuan"]) ?></p>
                          </div>
                      </div>
                  </a>
              </div>
      <?php
              $counter++;
          } else {
              break; // Hentikan iterasi setelah mencapai 5 data
          }
      }
      ?>
  </div>

  <!-- <div class="container-news">
    <div class="tips1">
      <a href="../../wafda/pendaftaran.html"><div class="tips-content1">
        <img src="../asset/img/display_gunting.jpg" alt="">
        <div class="desc-tips1"><p>Open recruitmnet Penjoki Game Mobile</p></div>
      </div></a>
      </div>
      <div class="tips2">
        <a href="#"><div class="tips-content2">
          <img src="../asset/img/display_gunting.jpg" alt="">
          <div class="desc-tips2"><p>3 Hero Rekomendasi Push Rank Untuk Para Solo Player Mobile Legends: Bang Bang</p></div>
      </div></a>
      </div>
      <div class="tips3">
        <a href="#"><div class="tips-content3">
          <img src="./images/hero-mlbb-push.jpeg" alt="">
          <div class="desc-tips3"><p>3 Hero Rekomendasi Push Rank Untuk Para Solo Player Mobile Legends: Bang Bang</p></div>
      </div></a>
      </div>
      <div class="tips4">
        <a href="#"><div class="tips-content4">
          <img src="./images/giveaway.jpeg" alt="">
          <div class="desc-tips4"><p>Cara Mudah Memenangkan Giveaway Diamond Free Fire Gratis Dari JasakuID</p></div>
        </div></a>
      </div>
      <div class="tips4">
        <a href="#"><div class="tips-content4">
          <img src="./images/giveaway.jpeg" alt="">
          <div class="desc-tips4"><p>Cara Mudah Memenangkan Giveaway Diamond Free Fire Gratis Dari JasakuID</p></div>
        </div></a>
      </div>
  </div> -->
  <div class="news-btn">
    <button><a href="display.php">Lihat Semua Produk</a></button>
  </div>
  
  </div>
  <!-- footer -->
  <?php 
  include "../asset/layout/footer.php";
  ?>
</body>
</html>