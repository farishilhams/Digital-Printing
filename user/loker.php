<?php 

include "../asset/db/koneksi.php";

if (isset($_POST["kirim"])) {
    if (isset($_SESSION["id_user"])){
        $result = loker($_POST);
        
        if ($result > 0) : ?>
            <script>
                alert('Form Telah Dikirim');
                window.location.href = 'index.php';
            </script>
        <?php else : ?>
            <script>
                alert('Form Gagal dikirim');
            </script>
        <?php endif;
    }else{ ?>
        <script>
            alert('Sialahkan Login Terlebih Dulu');
        </script>
    <?php }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lowongan Kerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(./asset/img/banner.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: auto;
            /* background: #fff; */
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            margin-left: 120px;
            background: #333;
            color: #fff;
            padding: 10px;
            border: none;
            width: 50%;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran <br>Lowongan Kerja</h2>
        <form action="" method="post">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" required>

            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" required>

            <label for="email">Email</label>
            <input type="text" name="email" required>

            <label for="umur">Umur</label>
            <input type="number" name="umur" required>

            <label for="cv">CV</label>
            <input type="file" name="cv" required>

            <button type="submit" name="kirim">Kirim Lamaran</button>
        </form>
    </div>
</body>
</html>