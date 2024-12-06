<?php 
include "../asset/db/koneksi.php";

if (isset($_POST["submit"])) {
    $add = add_promo($_POST);
    
    if ($add > 0) : ?>
        <script>
            alert('Barang Berhasil Ditambahkan');
            window.location.href = 'index.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Perusahaan</title>
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
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        table {
            width: 100%;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="nama">Nama Promo:</label></td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal Promo:</label></td>
                <td><input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="keterangan">Keterangan Promo:</label></td>
                <td><textarea name="keterangan" id="" cols="30" rows="5" required></textarea></td>
            </tr>
            <tr>
                <td><label for="img">Gambar Promo:</label></td>
                <td><input type="file" name="img" required></td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Tambah">
    </form>

</body>
</html>
