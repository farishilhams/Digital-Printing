<?php 
  include "../asset/db/koneksi.php";

$user = $_SESSION["username"];

  

  if (isset($_POST["pesan"])){
    $nama  = $_POST["name"];
    $pesan  = $_POST["psn"];

    $pesan = mysqli_query($conn,"INSERT INTO tb_contact VALUES ('','$nama','$pesan')");
    if($pesan) {
    ?> <script>alert("baiklah")</script>
    <?php 
    }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../asset/css/customerservice.css">
  <title>Layanan Digital Printing</title>
</head>
<body>
  <div class="container">
        <div class="faq">
      <h2>Layanan Digital Printing</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="question">
            <h3>Apa itu layanan digital printing?</h3>
            <p>
              Layanan digital printing adalah proses mencetak secara digital yang
              memungkinkan reproduksi warna yang akurat dan hasil cetak yang cepat
              untuk desain baju, stiker, banner, dan banyak lagi.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="question">
            <h3>Bagaimana cara memesan layanan digital printing?</h3>
            <p>
              Anda dapat memesan layanan digital printing kami dengan mengisi formulir
              di bawah ini. Sertakan informasi detail mengenai pesanan Anda untuk
              hasil cetak yang optimal.
            </p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="question">
            <h3>Apa jenis materi yang dapat dicetak menggunakan layanan ini?</h3>
            <p>
              Kami menyediakan layanan cetak untuk berbagai materi seperti kertas,
              karton, dan bahan lainnya sesuai kebutuhan Anda, termasuk desain baju,
              stiker, banner, dan alat tulis seperti spidol, pensil, dll. Hubungi kami untuk
              informasi lebih lanjut.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="contact">
      <h2>Hubungi Kami untuk Layanan Digital Printing</h2>
      <p>
        Jika Anda tertarik atau memiliki pertanyaan lebih lanjut mengenai
        layanan digital printing, silakan isi formulir di bawah ini atau
        hubungi kami melalui informasi kontak yang disediakan:
      </p>
      <form id="contact-form" method="post" action="">
        <div class="row">
          <div class="col-md-6">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?= $user ?>" readonly>
          </div>
          <!-- <div class="col-md-6">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required />
          </div> -->
        </div>
        <div class="mb-3">
          <label for="message">Pesan:</label>
          <textarea id="message" name="psn" class="form-control" rows="5" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="pesan">kirim</button>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
