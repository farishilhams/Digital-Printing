<?php 
// session_start();
include '../asset/db/koneksi.php';
if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = getUsername($username);
    $_SESSION["id_user"] = $user["id_user"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["nama_user"] = $user["nama_user"];
    $_SESSION["password"] = $user["password"];


    if (!empty($user)) {
        if (($password) == $user["password"]) {
            $_SESSION["login"] = true; ?>
            <script>
                alert('Anda Berhasil Login')
                window.location.href = 'index.php'
            </script>
            <?php 
            exit;
        }
        $error = "password dan username salah";
    }
    $error = "username tidak ditemukan";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/l.css">
    <title>Document</title>
</head>
<body>
    <div class="container">

        <form action="" method="POST">
            <table align="center">
                <tr>
                    <td><p align="center">LOGIN</p></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="username" placeholder="Username"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td>
                        
                        <button type="submit" name="login" id="login">Log in</button>
                    </td>
                </tr>
                <tr>
                    <td class="reg">Belum Punya Akun? <a href="register.php">Register disini</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>