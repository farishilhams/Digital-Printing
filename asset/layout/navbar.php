<?php 
if (isset($_SESSION['id_user']) and isset($_SESSION['nama_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama_user = $_SESSION["nama_user"];
} else {
    $id_user = null;
    $nama_user = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/navbar.css">
    <title>Document</title>
</head>
<body>
<nav class="nav">
    <div class="container-navbar">
      <div class="logo">
        <!-- <h1>Jasaku.id</h1> -->
        <a href="homs.php">Printz.id</a>
      </div>
      <div class="search-bar-container">
        <div class="search-bar">
          <div class="search-logo">
            <img src="asset/pict/keranjang.png" alt="" />
          </div>
          <input type="text" name="search-bar" id="search-bar" placeholder="Cari Produk" />
        </div>
      </div>
      <?php if (isset($nama_user)){?>
      <div class="ctas">
        <a href="keranjang.php">
          <div class="ds-relative">
              <img src="asset/pict/keranjang.png" alt="">
          </div>
        </a>
        
      </div>
      <div class="ctas">
        <a href="pembayaran.php">
          <p>Transaksi</p>
        </a>
      </div>
      <?php }?>
      <?php if (!isset($nama_user)){?>
      <div class="ctas">
        <a href="login.php">
          <p>Login</p>
        </a>
      </div>
      <?php }else {?>
        <div class="ctas">
            <a href="profile.php?id_user=<?= $id_user ?>">
                <p><?= $nama_user ?></p>
            </a>
        </div>
        <?php }?>
    </div>
  </nav>
  <div class="container-menu">
    <a href="homs.php" class="beranda">
      <div class="logo">
        <img src="./images/home.png" alt="" />
      </div>
      <p>Beranda</p>
    </a>
    <a href="display.php" class="games">
      <div class="logo">
        <img src="./images/game-controller.png" alt="" />
      </div>
      <p>Semua Product</p>
    </a>
    <a href="" class="top-up">
      <div class="logo"><img src="./images/diamond.png" alt="" /></div>
      <p>Printing</p>
    </a>
    <a href="" class="help">
      <div class="logo"><img src="./images/help.png" alt="" /></div>
      <p>Bantuan</p>
    </a>
    <a href="" class="about">
      <div class="logo"><img src="./images/about.png" alt="" /></div>
      <p>Tentang Kami</p>
    </a>
  </div>

</body>
</html>