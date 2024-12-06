<?php
require "../asset/db/koneksi.php";

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
$previous = $halaman - 1;
$next = $halaman + 1;

$datapromo = query("SELECT * FROM tb_promo LIMIT $halaman_awal, $batas");
$total_halaman = ceil(count(query("SELECT * FROM tb_promo")) / $batas);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Promo</title>
</head>
<body>
    <div>
        <h2>Data Transaksi</h2>
        <table border="1" cellpadding="15" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Waktu Transaksi</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataTransaksi)) : ?>
                    <?php $i = $halaman_awal + 1; ?>
                    <?php foreach ($dataTransaksi as $transaksi) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $transaksi["id_transaksi"] ?></td>
                            <td><?= $transaksi["waktu_transaksi"] ?></td>
                            <td><?= $transaksi["keterangan"] ?></td>
                            <td><?= formatHarga($transaksi["total"]) ?></td>
                            <td><?= $transaksi["pelanggan_id"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Data tidak ditemukan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div>
            <ul>
                <?php if ($previous > 0) : ?>
                    <li><a href="?halaman=<?= $previous ?>&batas=<?= $batas ?>">Prev</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li <?= $i == $halaman ? "class='active'" : "" ?>><a href="?halaman=<?= $i ?>&batas=<?= $batas ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <?php if ($next <= $total_halaman) : ?>
                    <li><a href="?halaman=<?= $next ?>&batas=<?= $batas ?>">Next</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</body>
</html>