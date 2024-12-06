<?php 
if (isset($_SESSION['id_user']) and isset($_SESSION['username'])) {
    $id_user = $_SESSION['id_user'];
    $nama_user = $_SESSION["username"];
} else {
    $id_user = null;
    $nama_user = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Printz.id</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://snapy.co.id/assets/assets_shop/css/style-ori.css" rel="stylesheet">
    <link rel="stylesheet" href="https://snapy.co.id/assets/assets_branch/css/filter.css">
    <link rel="stylesheet" href="https://snapy.co.id/assets/assets_branch/css/theme.css">

    
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {
    font-family: "poppins";
    text-decoration: none;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    .dark-navbar {
        background-color: #333; 
    }

    .dark-navbar .navbar-nav .nav-link {
        color: #fff; 
    }

    .ml-auto a {
        color:#ffffff;
    }

    .ml-auto a:hover {
        color:red;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #bfbdba;
        min-width: 160px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var dropdowns = document.getElementsByClassName("dropdown");
            var i;

            for (i = 0; i < dropdowns.length; i++) {
                dropdowns[i].addEventListener("click", function () {
                    this.querySelector(".dropdown-content").classList.toggle("show");
                });
            }
        });

        window.onclick = function (event) {
            if (!event.target.matches('.btn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>


</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm dark-navbar">

        <div class="container">
            <a href="index.php" class="navbar-brand">
                <img src="../asset/img/logo1.png" alt="Logo Branch" style="width: 130px;">
            </a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="promo.php" class="nav-link">Promo</a>
                    </li>
                    <li class="nav-item">
                        <a href="outlets.php" class="nav-link">Outlet</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="nav-link">Produk</a>
                            <div class="dropdown-content">
                                <a href="display.php" class="nav-link">Barang</a>
                                <a href="print.php" class="nav-link">Cetak Desain</a>
                                <?php 
                                if (isset($_SESSION["id_user"])){
                                ?>
                                    <a href="go_print.php" class="nav-link">Go Print</a>
                                <?php }?>
                            </div>
                        </div>
                    </li>
                    
                    
                    <?php if (isset($nama_user)){?>

                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="#" class="nav-link">Transaksi</a>
                            <div class="dropdown-content">
                                <a href="pembayaran.php" class="nav-link">Barang</a>
                                <a href="pembayaran_print.php" class="nav-link">Print</a>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                    <!-- <li class="nav-item" style="margin-top:12px;margin-left:100px;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </li> -->
                    <?php if (isset($nama_user)){?>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn"><img src="../asset/img/keranjang.png" width="25px" alt="Logo"></button>
                            <div class="dropdown-content">
                                <a href="keranjang.php" class="nav-link"> Barang</a>
                                <a href="keranjang_print.php" class="nav-link">Print</a>
                            </div>
                        </div>
                    </li>
                    <?php }?>
                    
                </ul>
                <?php
                if (!isset($nama_user)) {
                    ?>
                    <div class="ml-auto">
                        <a href="login.php" class="btn">Login</a>
                    </div>
                <?php
                } else {
                    ?>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn" style="color:white"><?= $nama_user ?></button>
                            <div class="dropdown-content">
                                <a href="profile.php?id=<?= $id_user ?>">Profile</a>
                                <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin Logout?')">Logout</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>    
</header>
<!-- <div class="page-section bg-light py-0">
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <h1 class="text-center">Contact</h1>
                </div>
            </div>
        </div>
    </div>
</div> -->
</body>
</html>