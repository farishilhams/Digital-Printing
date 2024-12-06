<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id_tp"];
$desain = query("SELECT * 
                FROM detial_transaksi_print 
                JOIN tb_transaksi_print ON detial_transaksi_print.id_tp = tb_transaksi_print.id_tp
                JOIN tb_user ON tb_transaksi_print.id_user = tb_user.id_user 
                WHERE tb_transaksi_print.id_tp = $id
                ORDER BY tb_transaksi_print.tgl_tp")[0];

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
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Ukuran</th>
            <th>Quantity</th>
            <th>Gambar</th>
            <th>Kualitas</th>
        </tr>
        <tr>
            <td><?= $desain["tgl_tp"] ?></td>
            <td><?= $desain["username"] ?></td>
            <td><?= $desain["desain"] ?></td>
            <td><?= $desain["ukuran"] ?></td>
            <td><?= $desain["quantity"] ?></td>
            <?php 
            if ($desain["desain"] == "Print"){
            ?>
                <td><img src="../asset/img/file.png" alt="" style="height:100%;width:150px"></td>
            <?php }else{?>
                <td><img src="<?= $desain["img"] ?>" alt="" style="height:100%;width:150px"></td>
            <?php }?>
            <td><?= $desain["quality"] ?></td>
        </tr>
    </table>
</body>
</html>