<?php 
include "../asset/db/koneksi.php";

if (isset($_POST["submit"])) {
    if (!empty($_POST["nama_user"]) && !empty($_POST["alamat"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        if (addUser($_POST) > 0) {
            echo "<script>
                alert('Akun anda berhasil dibuat');
                window.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
                alert('Data Gagal Ditambahkan');
            </script>";
        }
    } else {
        echo "<script>
            alert('Form tidak lengkap. Mohon isi semua field.');
            history.back();
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/l.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
                <table cellspacing="0" align="center">
                <tr>
                    <td><p align="center">Registrasi</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="nama_user" placeholder="Masukkan Nama"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="alamat" placeholder="Masukkan Alamat"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="username" placeholder="Masukkan Username"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="password" placeholder="Masukkan Password"></td>
                </tr>
                <tr>
                    <td><button type="submit" name="submit">Buat</button></td>
                    
                </tr>
            </table>
        </form>
    </div>
</body>
</html>