<?php 
include "../asset/db/koneksi.php";

$service = query("SELECT * FROM tb_contact");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

        }

        .container {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 40%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1 align="center">Customer Service</h1>
    <div class="container">
        <table border="1">
            <tr>
                <th>Nama</th>
                <th>Pesan</th>
            </tr>
            <?php 
            foreach ($service as $sv){
            ?>
            <tr>
                <td><?= $sv["nama_contact"] ?></td>
                <td><?= $sv["pesan"] ?></td>
            </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>