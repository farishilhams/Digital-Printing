<?php 
include "../asset/db/koneksi.php";

if (isset($_POST["submit"])) {
    if (isset($_SESSION["id_user"])){
        $result = form_supp($_POST);
        
        if ($result > 0) : ?>
            <script>
                alert('Form Anda Telah Dikirim');
                window.location.href = 'index.php';
            </script>
        <?php else : ?>
            <script>
                alert('Form Gagal dikirim');
            </script>
        <?php endif;
    }else { ?>
        <script>
            alert('Silahkan Login Dulu Untuk Mengirim Form');
        </script>
    <?php }
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div style="text-align: center; margin-bottom: 20px; margin-right:70px">
        <h1 style="color: #333; font-family: 'Arial', sans-serif;">Daftarkan Perusahaan Anda</h1>
        <p style="color: #666; font-size: 16px;">Isi formulir disamping dan memulai bergabung bersama kami!</p>
        <img src="../asset/img/logo1.png" alt="" style="margin-top:30px;width:300px;height:100%">
    </div>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nama_supp">Nama Perusahaan :</label></td>
                <td><input type="text" name="nama_supp" required></td>
            </tr>
            <tr>
                <td><label for="alamat_supp">Alamat Perusahaan :</label></td>
                <td><input type="text" name="alamat_supp" required></td>
            </tr>
            <tr>
                <td><label for="telp_supp">Telepon Perusahaan :</label></td>
                <td><input type="tel" name="telp_supp" required></td>
            </tr>
            <tr>
                <td><label for="desc_supp">Deskripsi Perusahaan:</label></td>
                <td><textarea name="desc_supp" id="" cols="30" rows="5" required></textarea></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Daftar">
    </form>
</body>

</html>
