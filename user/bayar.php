<?php 
include "../asset/db/koneksi.php";
$iduser = $_SESSION["id_user"];
$total = query("SELECT total_harga FROM keranjang WHERE id_user = $iduser");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["metode_pembayaran"])) {
        $selectedtotal = $_POST["total_transaksi"];
        $selectedtt = $_POST["tt_transaksi"];
        $keranjang = $_POST["id_keranjang"];
    }
    
    if (isset($_POST["metode_pembayaran"])) {
        $selectedMetode = $_POST["metode_pembayaran"];
    }
} 
$bank = query("SELECT * FROM tb_bank WHERE nama_bank = '$selectedMetode'");



if (isset($_POST["bayar"])) {
    $result = addtransaksi($_POST);
    
    if ($result > 0) : ?>
        <script>
            alert('Transaksi Berhasil');
            window.location.href = 'pembayaran.php';
        </script>
    <?php else : ?>
        <script>
            alert('Data Gagal diubah');
        </script>
    <?php endif;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/checkout.css">
    <title>PEMILIHAN METODE PEMBAYARAN</title>
</head>
<body>
    <header>
        <h1>PEMBAYARAN</h1>
    </header>
    <div class="container" style="text-align: center;">
        <form action="" method="POST">

        <h1 style="color: darkblue;">SCAN</h1>
        <img src="../asset/img/barcode.jpg" alt="">
            <input type="hidden" readonly value="<?= date("Y-m-d") ?>" name="tanggal"></td>
            <input type="hidden" name="total" value="<?= $selectedtt?>">

            <input type="hidden" name="metode" id="metode_pembayaran" value="<?= $selectedMetode ?>">
            <input type="hidden" name="id_keranjang" id="id_keranjang" value="<?= $keranjang ?>">
            <?php foreach($bank as $bnk): ?>
                <h3 style="color: darkblue;"><?= $bnk["kode_VA"] ?></h3>    
            <?php endforeach?>

            <button type="submit" name="bayar" class="bayar">BAYAR</button>
            <!-- <a href="bayar.php" class="bayar">Lanjutkan Pembayaran</a> -->
        </form>
    </div>
</body>
</html>