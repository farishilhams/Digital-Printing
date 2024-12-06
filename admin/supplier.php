<?php 
include "../asset/db/koneksi.php";

$dataSupp = query("SELECT * FROM form_sup");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
        @import url("https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

        body {
            font-family: "poppins";
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }


        th {
            background-color: #f2f2f2;
            text-align: center; /* Center the text in th elements */
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        td a {
            display: inline-block;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            margin-right: 4px;
        }

        td .tolak{
            background-color:red;
        }
        td .terima{
            background-color:green
        }
        
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Alamat Perusahaan</th>
                <th>No Telp. Perusahaan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (!empty($dataSupp)){
                $no = 1;
                foreach ($dataSupp as $sup){
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $sup["nama_supp"] ?></td>
                    <td><?= $sup["alamat_supp"] ?></td>
                    <td><?= $sup["telp_supp"] ?></td>
                    <td style="text-align:justify;"><?= $sup["desc_supp"] ?></td>
                    <td>
                        <a class="button tolak" href="tolak.php?id=<?= $sup["id_form"] ?>">Tolak</a>
                        <a class="button terima" href="terima.php?id=<?= $sup["id_form"] ?>">Terima</a>
                    </td>
                </tr>
            <?php }
            }else{?>
                <tr>
                    <th colspan="6">Belum Ada Supplier Yang Mendaftar</th>
                </tr>
            <?php }?>
        </tbody>
    </table>
</body>
</html>
