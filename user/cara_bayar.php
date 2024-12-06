<?php 
    include "../asset/db/koneksi.php";


include "../asset/layout/navbar_ns.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container-fluid bg-secondary my-3">
    <div class="container-md" style="width: 100%; background-color: azure;">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-center" style="color: darkblue;">PAYMENT</h1>
        </div>
    </div>
</div>

<div class="container-fluid pt-3">
    <div class="container-md">
        <div class="row px-xl-5">

            <div class="col-lg-6 col-md-6">
                <div class="card card-rounded shadow mb-2">
                    <div class="card-body">
                        <img src="../asset/img/payment-1.jpg" class="img-fluid d-block mb-3" alt="cara bayar 1">
                        <p class="text-justify">Sebelum Anda dapat melakukan transaksi/pemesanan barang di Printz.id, Anda harus mendaftarkan identitas Anda terlebih dahulu, hal ini dilakukan untuk melengkapi keterangan si pemesan barang yang nantinya akan digunakan sebagai alamat default pada saat Anda melakukan pemesanan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card card-rounded shadow mb-2">
                    <div class="card-body">
                        <img src="../asset/img/payment-2.jpg" class="img-fluid d-block mb-3" alt="cara bayar 2">
                        <p class="text-justify">Sebelum Anda dapat melakukan transaksi/pemesanan barang di Printz.id, Andai harus mendaftarkan identitas Anda terlebih dahulu, hal ini dilakukan untuk melengkapi keterangan si pemesan barang yang nantinya akan digunakan sebagai alamat default pada saat Anda melakukan pemesanan.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card card-rounded shadow mb-2">
                    <div class="card-body">
                        <img src="../asset/img/payment-3.jpg" class="img-fluid d-block mb-3" alt="cara bayar 3">
                        <p class="text-justify">Setelah Anda melakukan Konfirmasi Pembayaran. Kami akan melakukan verifikasi atas pembayaran Anda. proses verifikasi ini dilakukan setiap jam 17:00 wib pada setiap hari kerja yakni senin-jumat. Konfirmasi yang dilakukan setelah jam 17:00 wib atau hari libur akan di verifikasi pada hari berikutnya.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card card-rounded shadow mb-2">
                    <div class="card-body">
                        <img src="../asset/img/payment-4.jpg" class="img-fluid d-block mb-3" alt="cara bayar 4">
                        <p class="text-justify">Apabila layanan kami tidak memuaskan atau kualitas barang tidak sesuai silahkan kirimkan email keluhan Anda ke snapyorder@gmail.com dengan dilengkapi alasan ketidak puasan Anda, maka kami akan memberikan diskon 20% pada tagihan Anda sebagai tanggung jawab kami.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

    <?php 
        include "../asset/layout/footer.php";
    ?>

</body>
</html>