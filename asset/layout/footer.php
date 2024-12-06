<?php 
if (isset($_SESSION['id_user']) and isset($_SESSION['nama_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama_user = $_SESSION["nama_user"];
} else {
    $id_user = null;
    $nama_user = null;
}

$outlet = query("SELECT * FROM tb_cabang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Printz.id</title>
    <link rel="stylesheet" href="https://snapy.co.id/assets/assets_branch/css/theme.css">

    <style>
    .dark-navbar {
        background-color: #333; 
    }

    .dark-navbar .navbar-nav .nav-link {
        color: #fff; /* Ganti dengan warna teks yang sesuai dengan latar belakang */
    }

    
    </style>
</head>
<body>
<div class="container-fluid bg-dark text-light mt-0 pt-5">
    <div class="container-md">
        <div class="row px-xl-5 pt-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-xs-6 mb-5 pl-3 pr-1">
                        <h5 class="font-weight-bold text-light mb-4">Menu Cepat</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="customerservice.php"><i class="fas fa-angle-right mr-2"></i>Contact Us</a>
                            <a class="text-light mb-2" href="about.php"><i class="fas fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-light mb-2" href="go_print.php"><i class="fas fa-angle-right mr-2"></i>Printing</a>
                            <a class="text-light mb-2" href="cara_pesan.php"><i class="fas fa-angle-right mr-2"></i>How to Order</a>
                            <a class="text-light mb-2" href="cara_bayar.php"><i class="fas fa-angle-right mr-2"></i>How to Payment</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-6 mb-5 pl-3 pr-1">
                        <h5 class="font-weight-bold text-light mb-4">Outlet Printz.id</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php 
                            $counter = 0;
                            foreach ($outlet as $ot){
                                if ($counter < 3){
                            ?>
                                    <a class="text-light mb-2" href="display_outlet.php?id=<?= $ot["id_cabang"] ?>"><i class="fas fa-store-alt mr-2"></i>Printz.id <?= $ot["cabang"] ?></a>
                            
                            <?php 
                                    $counter++;
                                }
                            }
                            ?>
                            <a class="text-light" href="outlets.php">More...</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-6 mb-5 pl-3 pr-1">
                        <h5 class="font-weight-bold text-light mb-4">Jam Buka Outlet</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="#"><i class="far fa-clock mr-2"></i>Senin-Jumat : 08.00 - 21.00</a>
                            <a class="text-light mb-2" href="#"><i class="far fa-clock mr-2"></i>Sabtu : 08.00 - 19.00</a>
                            <a class="text-light mb-2" href="#"><i class="far fa-clock mr-2"></i>Minggu : 12.00 - 21.00</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-xs-6 mb-5 pl-3 pr-1">
                        <h5 class="font-weight-bold text-light mb-4">Halaman</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <?php if (!isset($nama_user)){?>
                                <a class="text-light mb-2" href="login.php">Login</a>
                                <a class="text-light mb-2" href="register.php"></i>Register</a>
                            <?php }else{?>
                                <a class="text-light mb-2" href="logout.php" onclick="return confirm('Apakah anda yakin ingin Logout?')"></i>Logout</a>
                            <?php }?>
                            <a class="text-light mb-2" href="supplier.php">Supplier</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-3">
            <div class="col-md-12 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-light">
                    © <a class="text-light font-weight-semi-bold" href="#">Printz.id</a>. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>