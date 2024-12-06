<?php 
include "../asset/db/koneksi.php";

$promo = $_GET["promo"];

$diskon = query("SELECT * FROM tb_promo WHERE nama_promo = '$promo'")[0];
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
    <form action="">
        <input type="hidden" name="claim" value="<?= $diskon["harga_promo"] ?>" readonly>
        <table>
            <tr>
                <td>halo</td>
            </tr>
        </table>
    </form>
</body>
</html>
<!-- <a href="display_promo.php?id=1" class="btn btn-orange float-right">More Details</a> -->