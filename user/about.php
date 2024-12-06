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
	<html lang="zxx"> 
		<head>
			<meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			<title>About_Us</title>
			<link rel="stylesheet" type="text/css" href="../asset/css/about.css">
		</head>
		<body style="background-color: #E2FFFF;"> 


			<!-- bagian content dan sidebar yang dibungkus dalam 1 section -->
			<div class="content_n_sidebar">
				<!-- bagian content -->
				<div class="content">
					<br>
					<h1>PENGEMBANGAN APLIKASI WEB IF3G</h1>
					<br>
					<h2>Kelompok 2 DIGITAL PRINTING</h2>

					<!-- foto pertama -->
					<div class="anak">
						<img src="../asset/img/bahus.png" alt="mishbahus surur">
						<h5>Nama : Mishbahus Surur <br> Nim : 220411100013</h5>
					</div>

					<!-- foto kedua -->
					<div class="anak">
						<img src="../asset/img/wafda.png" alt="muhammad farish wafda" style="width: 80%; margin-left:35px;">
						<h5>Nama : Muhammad Faris Wafda <br> Nim : 220411100039</h5>
					</div>

					<!-- foto ketiga -->
					<div class="anak">
						<img  src="../asset/img/habib.png" alt="habib">
						<h5>Nama : Muhammad Habibur Rohman <br> Nim : 220411100079</h5>
					</div>

					<!-- foto keempat -->
					<div class="anak">
						<img src="../asset/img/hendra.jpg" alt="hendra" style="width: 80%;">
						<h5>Nama : Hendra Hartono <br> Nim : 220411100142</h5>
					</div>

					<!-- foto kelima -->
					<div class="anak">
						<img src="../asset/img/farish.jpg" alt="farish">
						<h5>Nama : Farish Ilham Syahrani <br> Nim : 220411100166</h5>
					</div>

			<div>
				<p style="text-align:justify; width: 70%;margin-left:15%">
					<b>Digital Printing :</b>
					merupakan salah satu website yang kami buat menyediakan berbagai macam produk dan jasa. produk kami sudah memiliki kualitas yang sangat baik.
					karena kami bekerjasama dengan berbagai macam brain yang ternama serta untuk layanan jasa kami sangat baik. Kami juga menyediakan desainer yang ternama.
					Maka jangan pernah ragu untuk masalah percetakan kami selalu ada. 
				</p>
			</div>
	<?php 
	include "../asset/layout/footer.php";
	?>
		</body>
	</html>