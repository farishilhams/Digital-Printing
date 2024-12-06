<?php 
include "../asset/db/koneksi.php";

$refund = query("SELECT * FROM tb_refund_dana ");
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
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <table border="1" align="center" cellpadding="10" >
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>ID BARANG</th>
            <th>Alasan</th>
            <th>Bukti</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($refund as $re){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $re["nama"] ?></td>
            <td><?= $re["nama_barang"] ?></td>
            <td><?= $re["alasan"] ?></td>
            <td><img src="<?= $re["img"] ?>" alt="bukti"></td>
        </tr>
        <?php }?>
    </table>
</body>
</html>