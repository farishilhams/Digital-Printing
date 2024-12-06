<?php
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";



$id = $_SESSION["id_user"];
$keranjang = query("SELECT * FROM keranjang_print WHERE id_user = $id");

if (isset($_SESSION['id_user'])) {
    if (isset($_POST['submit'])) {
        if (empty($keranjang)){
            if (printing($_POST) > 0) {
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
    <title>Request Desain</title>
    <link rel="stylesheet" href="../asset/css/request.css">
</head>

<body>
    <header>
        <h1 class="header">Go-Print</h1>
    </header>
    <div class="container-request">
        <form action="" method="POST" class="request-form">
            <input type="hidden">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama Print:</label>
                        <input type="text" name="nama" class="form-input" required>
                    </td>
                    <td>
                        <label for="tipe" class="form-label">Jenis:</label>
                        <input type="text" name="tipe" class="form-input" value="Print" readonly>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="qty" class="form-label">Jumlah Lembar : </label>
                        <input type="number" name="qty" placeholder="lembar ex: 5" min="1">
                        <label for="qty" class="form-label">Harga per lembar : Rp. 500</label>
                    </td>
                    <td>
                        <label for="kualitas" class="form-label">Kualitas Print</label>
                        <select name="kualitas" id="kualitas" class="form-select" required>
                            <option value="" disabled selected>--- Pilih Kualitas ---</option>
                            <option value="Hitam Putih">Hitam Putih</option>
                            <option value="Berwarna">Berwarna (+Rp.500 / lembar)</option>
                        </select>
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label for="file" class="form-label">Unggah File (JPG, PNG, PDF, WORD, RAR):</label>
                        <input type="file" name="img_print" class="form-input" accept=".jpg, .jpeg, .png, .pdf, .docx, .rar, .zip">
                    </td>
                    <td>
                        
                        <label for="ukuran" class="form-label">Pilih Kertas</label>
                        <select name="ukuran" class="form-select">
                            <option value="" disabled selected>--- Pilih Kertas ---</option>
                            <option value="A4">Kertas A4</option>
                            <option value="F4">Kertas F4</option>
                        </select>
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