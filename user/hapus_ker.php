<?php
include "../asset/db/koneksi.php";

$id_keranjang = $_GET["id"];

$keranjang = query("SELECT * FROM keranjang WHERE id_keranjang = $id_keranjang")[0];

$id_barang = $keranjang['id_barang'];
$qty_to_return = $keranjang['qty'];
$query_return_stock = "UPDATE tb_barang SET stok = stok + $qty_to_return WHERE id_barang = $id_barang";
mysqli_query($conn, $query_return_stock);

$query_delete_keranjang = "DELETE FROM keranjang WHERE id_keranjang = $id_keranjang";
mysqli_query($conn, $query_delete_keranjang);

header('Location: keranjang.php');
?>