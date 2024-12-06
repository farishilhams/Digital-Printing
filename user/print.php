<?php 
include "../asset/db/koneksi.php";
$jasa = query("SELECT * FROM jasa");

include "../asset/layout/navbar_ns.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Digital Printing</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="../asset/css/print.css">
  <script>
    function submitRequest(category) {
      var confirmation = confirm('Apakah Anda yakin ingin mengirim permintaan desain untuk kategori ' + category + '?');
      if (confirmation) {
        window.location.href = "request.php";
      }
    }

    function printDesign(category, designName) {
      var confirmation = confirm('Apakah Anda yakin ingin mencetak desain ' + designName + ' pada kategori ' + category + '?');
      if (confirmation) {
        window.location.href = "request.php";
      }
    }
  </script>
</head>
<body>

<div class="my-container">
  <h2 class="my-4">Pilih Desain untuk Di-print</h2>
  <hr><hr>
  <!-- Banner Category -->
  <!-- <h3 class="my-3">Banner</h3> -->
  <div class="row" id="banner-category">
    <?php
    $limit = 0; 
    foreach ($jasa as $js) {
      if ($limit < 3) {

      
    
    ?>
      <div class="col-md-4">
        <div class="product-card">
          <img src="<?= $js["img_jasa"] ?>" class="img-fluid" alt="Desain Banner 1">
          <h4>Desain <?= $js["nama_jasa"] ?></h4>
          <?php 
          if (isset($_SESSION["id_user"])){
          ?>
            <a href="printer.php?desain=<?= $js["nama_jasa"] ?>"><button class="btn btn-primary">Cetak</button></a>
          <?php }else{?>
            <a href="index.php"><button class="btn btn-primary">Silahkan Login Terlebih Dahulu</button></a>
          <?php }?>
        </div>
      </div>

    <?php 
      $limit++;
      }
    }
    ?>
  
    <!-- <div class="col-md-4">
      <div class="product-card">
        <img src="../asset/Images/banner1.jpg" class="img-fluid" alt="Desain Banner 3">
        <h4>CUSTOM DENGAN DESAIN ANDA</h4>
        <a href="printer.php"><button class="btn btn-primary">Cetak</button></a>
      </div>
    </div> -->
  </div>

  <!-- Sticker Category -->
  
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php 
include "../asset/layout/footer.php";
?>
</body>
</html>
