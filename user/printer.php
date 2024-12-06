<?php
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$id = $_SESSION["id_user"];
$jenis = $_GET["desain"];
$keranjang = query("SELECT * FROM keranjang_print WHERE id_user = $id");

if (isset($_SESSION['id_user'])) {
    if (isset($_POST['submit'])) {
        if (empty($keranjang)){
            if ($jenis == "banner"){
                if (banner($_POST) > 0) {
                    ?>
                    <script>
                        alert('Request Desain Anda Berhasil Dikirim');
                        window.location.href = 'keranjang_print.php';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Gagal mengirim request desain. Silakan coba lagi.');
                    </script>
                    <?php
                }
            }else {
                if (stiker($_POST) > 0) {
                    ?>
                    <script>
                        alert('Request Desain Anda Berhasil Dikirim');
                        window.location.href = 'keranjang_print.php';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('Gagal mengirim request desain. Silakan coba lagi.');
                    </script>
                    <?php
                }
            }
        }else{  ?>
        <script>
            alert('Anda Masih Memiliki Barang Dikeranjang, Silahkan Lanjutkan Pesanan.');
            window.location.href = 'keranjang_print.php';
        </script>
<?php
        }
    }
} else {
    ?>
    <script>
        alert('Anda harus login untuk melakukan request desain.');
        window.location.href = 'login.php';
    </script>
    <?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desain</title>
    <link rel="stylesheet" href="../asset/css/request.css">
</head>

<body>
    <header>
        <h1 class="header">Pemesanan</h1>
    </header>
    <div class="container-request">
        <form action="" method="POST" class="request-form">
            <input type="hidden">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama Desain:</label>
                        <input type="text" name="nama" class="form-input" required>
                    </td>
                    <td>
                        <label for="tipe" class="form-label">Jenis Desain:</label>
                        <input type="text" name="tipe" class="form-input" value="<?= $jenis ?>" readonly>
                        
                    </td>
                </tr>
                <?php 
                if ($jenis == "stiker"){
                ?>
                    <tr>
                        <td>
                            <label for="qty" class="form-label">Quantity : </label>
                            <input type="number" name="qty" placeholder="pcs ex: 5">
                            <label for="qty" class="form-label">Harga per pcs : Rp.1500</label>
                        </td>
                        <td>
                            <label for="kualitas" class="form-label">Kualitas Desain:</label>
                            <select name="kualitas" id="kualitas" class="form-select" required>
                                <option value="" disabled selected>--- Pilih Kualitas ---</option>
                                <option value="Biasa">Kualitas Biasa</option>
                                <option value="Bagus">Kualitas Bagus (+Rp.500 / pcs)</option>
                            </select>
                        </td>
                    </tr>
                    
                <?php }?>
                <tr>
                    <td>
                        <?php 
                        if ($jenis == "banner"){
                            
                        ?>
                            <label for="ukuran" class="form-label">Pilih Ukuran (m)</label>
                        <?php 
                        }else{
                        ?>
                            <label for="ukuran" class="form-label">Pilih Ukuran (cm)</label>
                        <?php }?>
                        <input type="number" name="panjang" placeholder="panjang ex: 5"> X 
                        <input type="number" name="lebar" placeholder="lebar ex: 3">
                        <?php 
                        if ($jenis == "banner"){
                        ?>
                            <label for="note" class="form-label">Note : Harga per meter Rp. 15.000</label>
                        <?php }?>
                    </td>
                    <td>
                        <label for="file" class="form-label">Unggah File (JPG, PNG, atau PDF):</label>
                        <input type="file" name="img_print" class="form-input" accept=".jpg, .jpeg, .png, .pdf">
                    </td>
                    <!-- <td>
                        <label for="detail" class="form-label">Detail Desain:</label>
                        <textarea name="detail" id="detail" class="form-textarea" rows="4" cols="30" required></textarea>
                    </td> -->
                </tr>
            </table>
            <button type="submit" name="submit" class="form-button">Kirim</button>
            <!-- <a href="display.php" class="reset form-link">Batal</a> -->
        </form>
    </div>
    <?php include "../asset/layout/footer.php"; ?>
</body>

</html>
