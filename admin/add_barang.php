<?php 
include "../asset/db/koneksi.php";

$supplier = query("SELECT * FROM tb_supplier");

if (isset($_POST["submit"])) {
    $add = addbarang($_POST);
    
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;

        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            margin-top: 100px; /* Tambahkan margin atas agar lebih terpusat */
        }

        table {
            border-collapse: collapse;
            width: 800px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 50px;
            /* padding : 50px; */
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        label {
            font-weight: bold;
        }

        select, textarea, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2 align="center">Tambahkan Barang</h2>
    <div class="container">
        <form action="" method="post">
            <table align="center">
                <tr>
                    <td><label for="nama">Masukkan Nama Barang</label></td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td><label for="stok">Masukkan Stok</label></td>
                    <td><input type="number" name="stok"></td>
                </tr>
                <tr>
                    <td><label for="harga">Masukkan harga satuan</label></td>
                    <td><input type="number" name="harga"></td>
                </tr>
                <tr>
                    <td><label for="supplier">Pilih Supplier</label></td>
                    <td>
                        <select name="supplier">
                            <?php foreach ($supplier as $sup){?>
                                <option value="<?= $sup["id_supplier"] ?>"><?= $sup["nama_supplier"] ?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="keterangan">Tambahkan Keterangan</label></td>
                    <td><textarea name="keterangan" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td><label for="kategori">Pilih Kategori</label></td>
                    <td>
                        <select name="kategori">
                            <option value="alat_tulis">Alat Tulis</option>
                            <option value="buku">buku</option>
                            <option value="eraser">Penghapus</option>
                            <option value="lain-lain">Lain-Lain</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="img">Masukkan Gambar Barang</label></td>
                    <td><input type="file" name="img"></td>
                </tr>
                <tr>
                    <td><button class="simpan" type="submit" name="submit">Tambah</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>