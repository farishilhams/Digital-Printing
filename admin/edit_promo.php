<?php 

include "../asset/db/koneksi.php";

// $supplier = query("SELECT * FROM tb_supplier,tb_barang WHERE tb_supplier.id_supplier = tb_barang.id_barang");

$id = $_GET["id"];
$query_barang = mysqli_query($conn, "SELECT * FROM tb_promo WHERE id_promo = $id");
$barang = mysqli_fetch_assoc($query_barang);

if(isset($_POST["edit"])) {
    $nama = $_POST["nama_promo"];
    $tanggal_promo = $_POST["tanggal_promo"];
    $keterangan_promo = $_POST["keterangan_promo"];
    $img_promo = $_POST["img_promo"];
    $harga_promo = $_POST["harga_promo"];

    $edit = mysqli_query($conn, "UPDATE tb_promo SET nama_promo = '$nama', tanggal_promo = '$tanggal_promo', keterangan_promo = '$keterangan_promo', img_promo = '../asset/img/$img_promo', harga_promo = '$harga_promo' WHERE id_promo = '$id'");

    if($edit) {
        echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'show_promo.php';
        </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Promo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <h2>Edit Promo</h2>
        <form method="post" class="row g-3 mt-5">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nama Promo</label>
                <input type="text" class="form-control" name="nama_promo" value="<?= $barang['nama_promo']; ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Tanggal Promo</label>
                <input type="date" class="form-control" name="tanggal_promo" value="<?= $barang['tanggal_promo']; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Harga Satuan</label>
                <input type="text" name="keterangan_promo" class="form-control" value="<?= $barang['keterangan_promo']; ?>">
            </div>
            <div class="col-md-6">
                <label for="id_supplier" class="form-label">Image </label>
                <img style="width: 80px;" src="<?= $barang['img_promo']; ?>" alt="gambar promo">
                <input type="file" name="img_promo" class="form-control" >
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Potongan </label>
                <textarea name="harga_promo" id="keterangan-barang" cols="50" rows="5" class="form-control"><?= $barang['harga_promo']; ?></textarea>
            </div>

            <div class="col-6">
                <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                <a href="index.php" class="btn btn-danger">Batal</a>
            </div>
        </form>

    </div>

</body>

</html>