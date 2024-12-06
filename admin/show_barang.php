<?php 

include "../asset/db/koneksi.php";


$barang = query("SELECT * FROM tb_barang");

if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $delete = mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang = $id");
    if($delete) {
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'show_barang.php';
        </script>";
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center py-4">
        <h2>Data Barang</h2>
        <!-- <a href="../logout.php" class="btn btn-danger">Logout</a> -->
    </div>  
    <div class="d-flex align-items-center">
        <!-- <div style="margin-right: 10px;">
            <a href="/admin/permintaan.php" class="btn btn-primary">Daftar Permintaan Pinjaman</a>
        </div> -->
        <div>
            <a href="add_barang.php" class="btn btn-warning">Tambah Barang</a>
        </div>
    </div>  

    <div class="table-container py-4 mt-2">
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok Barang</th>
                <th>Harga Satuan</th>
                <!-- <th>Keterangan</th> -->
                <th>Gambar</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach($barang as $brg) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $brg["nama_barang"]; ?></td>
                    <td><?= $brg["stok"] < 1 ? "Stok Habis" : $brg["stok"]; ?></td>
                    <td><?= $brg["harga_satuan"]; ?></td>
                    <!-- <td><?= $brg["keterangan_barang"]; ?></td> -->
                    <td><img style="width: 80px;" src="<?= $brg["img_barang"]; ?>" alt=""></td>
                    <td>
                        <a href="edit_barang.php?id=<?= $brg['id_barang']; ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Yakin untuk dihapus ?')" href="show_barang.php?delete=<?= $brg['id_barang']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    
</div>

  </body>
</html>