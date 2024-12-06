<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id"];
$form = query("SELECT * FROM form_sup WHERE id_form = $id")[0];

if (isset($_POST["submit"])) {
    $result = addsupp($_POST);
    $hapus = delete_sup($id);
    
    if ($result > 0) : ?>
        <script>
            alert('Supplier Ditambahkan');
            window.location.href = 'supplier.php';
        </script>
    <?php else : ?>
        <script>
            alert('Data Gagal diubah');
        </script>
    <?php endif;
}  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Penerimaan Supplier</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td><input type="text" name="nama" value="<?= $form["nama_supp"] ?>"readonly></td>
            </tr>
            <tr>
                <td><input type="text" name="alamat" value="<?= $form["alamat_supp"] ?>"readonly></td>
            </tr>
            <tr>
                <td><input type="text" name="telp" value="<?= $form["telp_supp"] ?>"readonly></td>
            </tr>
            <tr>
                <td>
                    <label for="img">Masukkan Gambar Perusahaan:</label>
                    <input type="file" name="img">
                </td>
            </tr>
        </table>
        <button type="submit" name="submit">Terima</button>
    </form>
</body>
</html>