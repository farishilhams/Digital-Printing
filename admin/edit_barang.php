<?php 

include "../asset/db/koneksi.php";

// $supplier = query("SELECT * FROM tb_supplier,tb_barang WHERE tb_supplier.id_supplier = tb_barang.id_barang");

$id = $_GET["id"];
$query_barang = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang = $id");
$barang = mysqli_fetch_assoc($query_barang);

if(isset($_POST["edit"])) {
    $nama = $_POST["nama_barang"];
    $stok = $_POST["stok"];
    $harga_satuan = $_POST["harga_satuan"];
    $id_supplier = $_POST["id_supplier"];
    $keterangan_barang = $_POST["keterangan_barang"];
    $kategori = $_POST["kategori"];
    // $img_barang = $_POST["img_barang"];
    // $keterangan_barang = $_POST["keterangan_barang"];

    // img_barang = '../asset/img/$img_barang'
    $edit = mysqli_query($conn, "UPDATE tb_barang SET nama_barang = '$nama', stok = '$stok', harga_satuan = '$harga_satuan', id_supplier = $id_supplier, keterangan_barang = '$keterangan_barang', kategori = '$kategori'  WHERE id_barang = $id");

    if($edit) {
        echo "<script>
            alert('Data berhasil diubah!');
            window.location.href = 'index.php';
        </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <h2>Edit Barang</h2>
        <form method="post" class="row g-3 mt-5">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" readonly value="<?= $barang['nama_barang']; ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Stok</label>
                <input type="text" class="form-control" name="stok" value="<?= $barang['stok']; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Harga Satuan</label>
                <input type="text" name="harga_satuan" class="form-control" value="<?= $barang['harga_satuan']; ?>">
            </div>
            <div class="col-md-6">
                <label for="id_supplier" class="form-label"></label>
                <input type="hidden" name="id_supplier" class="form-control" value="<?= $barang['id_supplier']; ?>">
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Keterangan</label>
                <!-- <input type="text" name="keterangan_barang" class="form-control" value="<?= $barang['keterangan_barang']; ?>"> -->
                <textarea name="keterangan_barang" id="keterangan-barang" cols="50" rows="5" class="form-control"><?= $barang['keterangan_barang']; ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">Kategori</label><br>
                <select name="kategori">
                    <option value=" <?= $barang["kategori"] ?> "><?= $barang["kategori"] ?></option>
                    <option value="alat_tulis">Alat Tulis</option>
                    <option value="buku">buku</option>
                    <option value="eraser">Penghapus</option>
                    <option value="lain-lain">Lain-Lain</option>
                </select>
            </div>

            <!-- <div class="col-md-6">
                <label for="inputState" class="form-label">Gambar</label>
                <img style="width: 100px;" src="<?= $barang['img_barang']; ?>" alt="">
                <input type="file" name="img_barang" class="form-control">
            </div> -->

            <div class="col-6">
                <button type="submit" name="edit" class="btn btn-warning">Edit</button>
                <a href="index.php" class="btn btn-danger">Batal</a>
            </div>
        </form>

    </div>

</body>

</html>