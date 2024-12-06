<?php 
include "../asset/db/koneksi.php";

$id = $_GET["id"];

$user = query("SELECT * FROM tb_user WHERE id_user = $id")[0];

if (isset($_POST["submit"])){
    $result = edit_user($_POST);
    if ($result > 0) : ?>
        <script>
            alert('Data berhasil diubah, silahkan login kembali setelah data diubah');
            window.location.href = 'logout.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/editprofile.css">
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #007bff;
        }

        .input-group-text {
            background-color: #007bff;
            color: #ffffff;
            border: none;
        }

        .input-group-text i {
            font-size: 1.2rem;
        }

        .form-control {
            border: 2px solid #007bff;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            font-size: 18px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Edit Profile</h2>
        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Baru">
                </div>
            </div>
            <div class="mb-3">
                <label for="oldpw" class="form-label">Password Lama</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="oldpw" placeholder="Masukkan Password Lama" >
                </div>
            </div>

            <div class="mb-3">
                <label for="newpw" class="form-label">Password Baru</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" name="newpw" placeholder="Masukkan Password Baru">
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
