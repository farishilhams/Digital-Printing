<?php 
include "../asset/db/koneksi.php";

$loker = query("SELECT * FROM tb_loker");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftar</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        img {
            max-width: 60%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1 align="center">Pendaftar</h1>
    <table align="center" border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Umur</th>
            <th>CV</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($loker as $lok){?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $lok["nama_pendaftar"] ?></td>
            <td><?= $lok["email_pendaftar"] ?></td>
            <td><?= $lok["alamat_pendaftar"] ?></td>
            <td><?= $lok["umur_pendaftar"] ?></td>
            <td><img src="<?= $lok["cv"] ?>" alt="cv"></td>
        </tr>
        <?php }?>
    </table>
</body>
</html>