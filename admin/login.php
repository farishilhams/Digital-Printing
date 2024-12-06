<?php 
// session_start();
require '../asset/db/koneksi.php';
if(isset($_POST["login"])) {

    $username = $_POST["username_admin"];
    $password = $_POST["password_admin"];

    $user = getadmin($username);
    $_SESSION["id_admin"] = $user["id_admin"];
    $_SESSION["level"] = $user["level"];
    $_SESSION["username_admin"] = $user["username_admin"];

    if (!empty($user)) {
        if (($password) == $user["password_admin"]) {
            $_SESSION["login"] = true;?>
            <script>
                alert('Anda Berhasil Login')
                window.location.href = 'index.php'
            </script>
            <?php 
            exit;
        }else{ ?>
            <script>
                alert('Password atau username salah')
            </script>
        <?php  
            }
    } else { ?>
        <script>
            alert('Password atau username salah')
        </script>
    <?php
        }
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
            <td><p align="center">LOGIN ADMIN</p></td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" name="username_admin" placeholder="Username"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="password" name="password_admin" placeholder="Password"></td>
        </tr>
        <tr>
            <td>
                
                <button type="submit" name="login" id="login">Log in</button>
            </td>
        </tr>
        
    </table>
</form>
</div>
</body>
</html>