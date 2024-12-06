<?php 
include "../asset/db/koneksi.php";

$desain = query("SELECT * 
                FROM detial_transaksi_print
                JOIN tb_transaksi_print ON detial_transaksi_print.id_tp = tb_transaksi_print.id_tp
                JOIN tb_user ON tb_transaksi_print.id_user = tb_user.id_user
                ORDER BY tb_transaksi_print.tgl_tp");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/admin_pel.css">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Ukuran</th>
            <th>Quantity</th>
            <th>Gambar</th>
            <th>Kualitas</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($desain as $ds){
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $ds["tgl_tp"] ?></td>
            <td><?= $ds["username"] ?></td>
            <td><?= $ds["desain"] ?></td>
            <td><?= $ds["ukuran"] ?></td>
            <td><?= $ds["quantity"] ?></td>
            <td><img src="<?= $ds["img"] ?>" alt="" style="height:100%;width:150px"></td>
            <td><?= $ds["quality"] ?></td>
        </tr>
        <?php }?>
    </table>
</body>
</html>