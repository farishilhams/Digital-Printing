<?php 

include "../asset/db/koneksi.php";
$id = $_GET["id"];
$data = query("SELECT * FROM tb_barang WHERE id_barang = $id")[0];

// $keranjang = query("SELECT * FROM keranjang WHERE id_barang = $id")

if (isset($_POST["submit"])) {
    
    if(!isset($_SESSION["login"])) {?>
        <script>
            alert('Silahkan Login Terlebih Dahulu')
            window.location.href = 'index.php'
        </script>
        <?php exit;
    } elseif ($_POST["qty"] > $data["stok"]) {
        echo "<script>
            alert('Stok barang tidak cukup!');
            window.location.href = 'display.php'
        </script>";
        exit;
    }else {
        if (addkeranjang($_POST) > 0) {  ?>
            <?php minstok($_POST)?>
                <script>
                    alert('Barang Berhasil Ditambahkan Ke Keranjang')
                    window.location.href = 'keranjang.php'
                </script>
            <?php } else {  ?>
                <script>
                    alert('Data Gagal diubah')
                </script>
        <?php 
        }
        
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/item.css">
    <title>Product Details</title>
</head>
<body>
    <?php include "../asset/layout/navbar_ns.php";?>
    <div class="container">
        <h2 class="product-title" align="center">Item</h2>
        <div class="item-details">
        <img src="<?= $data["img_barang"] ?>" alt="">
            <form action="" method="post">
                <input type="hidden" name="id_barang" value="<?= $data['id_barang'] ?>">
                <div class="item-details-info">
                    <div class="item-name"><?= $data["nama_barang"] ?></div>
                    <div class="item-price"><?= formatHarga($data["harga_satuan"]) ?></div>
                    <input type="hidden" name="harga_satuan" value="<?= $data["harga_satuan"] ?>">
                    <?php 
                        if($data["stok"] < 1) {
                            echo "<label>Habis</label>
                            ";
                            exit;
                        }
                        
                        else { ?>
                            <div class="item-quantity">
                                <label for="qty">Jumlah:</label>
                                <input type="number" name="qty" id="qty" value="1" min="1">
                                <input type="hidden" name="stok" value="<?= $data["stok"] ?>">
                            </div>
                            <button type="submit" name="submit" class="add-to-cart">Tambah ke Keranjang</button>
                        <?php }
                    ?>
                    
                </div>
            </form>
        </div>
        <div class="item-description">
            <p class="judul">Keterangan Produk</p>
            <p class="ket"><?= $data["keterangan_barang"] ?></p>
        </div>
    </div>
    <?php include "../asset/layout/footer.php";?>

</body>
</html>
