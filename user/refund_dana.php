<?php
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$id = $_GET["id"];
$tr = query("SELECT * FROM detail_transaksi_barang, tb_barang WHERE id_transaksi = $id and tb_barang.id_barang = detail_transaksi_barang.id_barang");

$nama = $_SESSION["username"];

if (isset($_SESSION['id_user'])) {
    if (isset($_POST['submit'])) {
        if (refund_dana($_POST) > 0) {
            ?>
            <script>
                alert('Refund Dana Anda Sedang Kami Proses. Terima Kasih');
                window.location.href = 'pembayaran.php';
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Gagal mengirim permintaan refund dana. Silakan coba lagi.');
            </script>
            <?php
        }
    }
} else {
    ?>
    <script>
        alert('Anda harus login untuk melakukan refund dana.');
        window.location.href = 'login.php';
    </script>
    <?php
}

$brg = query("SELECT * FROM tb_barang");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Dana</title>
    <link rel="stylesheet" href="../asset/css/request.css">
</head>

<body>
    <header>
        <h1 class="header">Refund Dana</h1>
    </header>
    <div class="container-request">
        <form action="" method="POST" class="request-form">
            <input type="hidden">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" name="nama" class="form-input" value="<?= $nama ?>" readonly>
                    </td>
                    <td>
                        <label for="barang" class="form-label">Nama Barang:</label>
                        <select name="barang" >
                        <?php 
                        foreach ($tr as $brg){
                        ?>
                            <option value="<?= $brg["id_transaksi"] ?>"><?= $brg["nama_barang"] ?></option>
                        <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tanggal" class="form-label">Tanggal Permohonan:</label>
                        <input type="date" name="tanggal" class="form-input" value="<?= date("Y-m-d") ?>" readonly>
                    </td>
                    <td>
                        <label for="alasan" class="form-label">Alasan Refund:</label>
                        <textarea name="alasan" id="alasan" class="form-textarea" rows="4" cols="30" required></textarea>
                        <input type="file" name="img" id="img">
                    </td>
                    
                </tr>
            </table>
            <button type="submit" name="submit" class="form-button">Kirim</button>
            <a href="pembayaran.php" class="reset form-link">Batal</a>
        </form>
    </div>
    <?php include "../asset/layout/footer.php"; ?>
</body>

</html>
