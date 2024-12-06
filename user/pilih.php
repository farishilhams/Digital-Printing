<?php 
include "../asset/db/koneksi.php";

include "../asset/layout/navbar_ns.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container-pilih {
            display: flex;
            justify-content: center; /* Mengubah dari space-around menjadi center */
            align-items: center;
            height: 50vh;
            background-color: #f4f4f4;
        }

        .card {
            width: 300px;
            padding: 20px;
            margin: 50px; /* Menambahkan margin */
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        h1 {
            color: #333;
        }

        .lk {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        .lk:hover {
            color: #21618c;
        }
    </style>
</head>
<body>
    <div class="container-pilih">
        <div class="card">
            <h1>Transaksi Barang</h1>
            <a class="lk" href="pembayaran.php">Lihat Detail</a>
        </div>
        <div class="card">
            <h1>Transaksi Print</h1>
            <a class="lk" href="pembayaran_print.php">Lihat Detail</a>
        </div>
    </div>

<?php 
include "../asset/layout/footer.php";
?>
</body>
</html>
