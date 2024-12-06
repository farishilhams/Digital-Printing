<?php 

include "../asset/db/koneksi.php";


$promo = query("SELECT * FROM tb_promo");

if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $delete = mysqli_query($conn, "DELETE FROM tb_promo WHERE id_promo = $id");
    if($delete) {
        echo "<script>
            alert('Data berhasil dihapus!');
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
    <title>Show Promo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <div class="container">
    <div class="d-flex justify-content-between align-items-center py-4">
        <h2>Data Promo</h2>
        <!-- <a href="../logout.php" class="btn btn-danger">Logout</a> -->
    </div>  
    <div class="d-flex align-items-center">
        <!-- <div style="margin-right: 10px;">
            <a href="/admin/permintaan.php" class="btn btn-primary">Daftar Permintaan Pinjaman</a>
        </div> -->
        <div>
            <a href="add_promo.php" class="btn btn-warning">Tambah Promo</a>
        </div>
    </div>  

    <div class="table-container py-4 mt-2">
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Promo</th>
                <th>Tanggal Promo</th>
                <th>Keterangan Promo</th>
                <th>Potongan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    foreach($promo as $prm) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $prm["nama_promo"]; ?></td>
                    <td><?= $prm["tanggal_promo"] ?></td>
                    <td><?= $prm["keterangan_promo"]; ?></td>
                    <td><?= $prm["harga_promo"]; ?></td>
                    <td>
                        <a href="edit_promo.php?id=<?= $prm['id_promo']; ?>" class="btn btn-warning">Edit</a>
                        <a onclick="return confirm('Yakin untuk dihapus ?')" href="show_promo.php?delete=<?= $prm['id_promo']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    
</div>

  </body>
</html>