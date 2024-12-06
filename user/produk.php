<?php 
include "../asset/db/koneksi.php";

$dataBarang = query("SELECT * FROM tb_barang");
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
    <table border="1">
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Harga Satuan</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $no = 1;
        foreach ($dataBarang as $barang) {?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $barang["nama_barang"] ?></td>
                <td><?= $barang["stok"] ?></td>
                <td><?= $barang["harga_satuan"] ?></td>
                <td><a href="display_produk.php?id=<?= $barang["id_barang"] ?>">lihat</a></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>