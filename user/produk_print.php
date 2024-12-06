<?php 
include "../asset/db/koneksi.php";

$id_user = $_SESSION["id_user"];

$print = query("SELECT * FROM tb_banner WHERE id_user = $id_user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Banner</th>
            <th>Ukuran</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($print as $pr){
            $ukuran = $pr["panjang_banner"] + $pr["lebar_banner"];
            $total = $ukuran * $pr["harga_banner"];
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $pr["nama_banner"] ?></td>
            <td><?= $pr["panjang_banner"] ?> x <?= $pr["lebar_banner"] ?> Meter</td>
            <td><?= $total ?></td>
            <td>
                <a href="checkout.php?id=<?= $pr["id_banner"] ?>">Bayar</a>
            </td>
        </tr>
        <?php 
            $no++;
        }
        ?>
    </table>
</body>
</html>