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
<div class="container-fluid pt-3">
    <div class="container-md">

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Login or Sign Up</h2>
                        <p class="text-justify">Sebelum Anda dapat melakukan transaksi/pemesanan barang di Printz.id, Anda harus mendaftarkan identitas Anda terlebih dahulu, hal ini dilakukan untuk melengkapi keterangan si pemesan barang yang nantinya akan digunakan sebagai alamat default pada saat Anda melakukan pemesanan.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan1.jpg" class="img-fluid d-block" alt="cara pesan 1">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Order via Marketplace</h2>
                        <p class="text-justify">Selain order online melalui Web Store, Anda juga bisa melakukan order dari Marketplace kami di Tokopedia Printz.id atau Shopee Printz.id Official Shop. </p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan2.jpg" class="img-fluid d-block" alt="cara pesan 2">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Pilih Produk</h2>
                        <p class="text-justify">Pilih produk yang Anda inginkan, selanjutnya Anda dapat memilih kategori template dari produk yang Anda pilih, tersedia berbagai macam design template yang kami berikasn. Apabila Anda telah memiliki design sendiri dan ingin mencetaknya sesuai dengan produk yang anda pilih, Anda dapat menggunakan fasilitas upload file</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan3.jpg" class="img-fluid d-block" alt="cara pesan 2">
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Personalisasi Template</h2>
                        <p class="text-justify">Personalize template pilihan Anda dengan berbagai fitur yang kami sediakan, ubah ukuran, warna dan jenis font, atau tambahkan juga gambar ke dalam template Anda seperti foto atau logo perusahaan Anda.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="https://snapy.co.id/assets/assets_shop/image/cara-pesan/img-3.jpg" class="img-fluid d-block" alt="cara pesan 3">
                    </div>
                </div>
            </div>
        <div> -->

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Checkout Pesanan Anda</h2>
                        <p class="text-justify">Checkout barang yang telah Anda pesan pastikan total harga barang telah sesuai dengan jumlah barang yang Anda pilih. langkah selanjutnya Anda harus menentukan metode pengiriman untuk pemesanan Anda. Anda dapat memilih pengiriman via kurir ataupun ambil langsung di outlet kami.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan4.jpg" class="img-fluid d-block" alt="cara pesan 4">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Lakukan Pembayaran</h2>
                        <p class="text-justify">Setelah melakukan checkout pada order Anda, Silahkan lakukan pembayaran dan konfirmasikan pembayaran Anda melalui link yang terdapat pada email konfirmasi pemesanan yang Anda terima sebelumnya. Proses follow up setiap pemesanan yang masuk maksimal 1x24 jam setelah pembayaran kami terima.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan5.jpg" class="img-fluid d-block" alt="cara pesan 5">
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-rounded shadow mx-3 mb-2">
            <div class="card-body">
                <div class="row px-xl-5">
                    <div class="col-lg-6 col-md-6 pt-4">
                        <h2 class="font-weight-semi-bold text-center mb-3">Terima Pesanan Anda</h2>
                        <p class="text-justify">Kami akan melakukan proses print saat pembayaran telah kami terima. Untuk lama proses pengerjaan barang pesanan Anda, berbeda pada setiap itemnya, berkisar antara 1-3 hari kerja. sedangkan untuk waktu pengiriman tergantung pada alamat tujuan Anda.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 py-3 px-0">
                        <img src="../asset/img/cara_pesan7.jpg" class="img-fluid d-block" alt="cara pesan 6">
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