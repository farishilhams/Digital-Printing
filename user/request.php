<?php
include "../asset/db/koneksi.php";
include "../asset/layout/navbar_ns.php";

$id_user = $_SESSION["id_user"];

if (isset($_SESSION['id_user'])) {
    if (isset($_POST['submit'])) {
        if (banner($_POST) > 0) {
            ?>
            <script>
                alert('Request Desain Anda Berhasil Dikirim');
                window.location.href = 'display.php';
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
        <h1 class="header">Request Desain</h1>
    </header>
    <div class="container-request">
        <form action="" method="POST" class="request-form">
            <input type="hidden" name="id_user" value="<?= $id_user ?>">
            <table>
                <tr>
                    <td>
                        <label for="nama" class="form-label">Nama Desain:</label>
                        <input type="text" name="nama" class="form-input" required>
                    </td>
                    <!-- <td>
                        <label for="tipe" class="form-label">Jenis Desain:</label>
                        <select name="tipe" id="tipe" class="form-select" required>
                            <option value="" disabled selected>--- Pilih Jenis Desain ---</option>
                            <option value="banner">Banner</option>
                            <option value="sticker">Cetak Stiker</option>
                            <option value="mockup">Mockup</option>
                        </select>
                    </td> -->
                </tr>
                <tr>
                    <td>
                        <label for="ukuran" class="form-label">Pilih Ukuran</label>
                        <input type="number" name="panjang" placeholder="panjang ex: 5"> X
                        <input type="number" name="lebar" placeholder="lebar ex: 5">
                        <label for="note">Note: Harga per meter 15k, harga 1x1 meter 30k</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="file" class="form-label">Unggah File (JPG, PNG, atau PDF):</label>
                        <input type="file" name="file" class="form-input" accept=".jpg, .jpeg, .png, .pdf">
                    </td>
                </tr>
            </table>
            <button type="submit" name="submit" class="form-button">Kirim</button>
            <a href="display.php" class="reset form-link">Batal</a>
        </form>
    </div>
    <?php include "../asset/layout/footer.php"; ?>
</body>

</html>
