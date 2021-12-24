<?php
require 'inputdata.php';
$conn = mysqli_connect("localhost", "root", "", "login_sha1");

if (isset($_POST["submit"])) {
    // var_dump($_POST);

    //cek apakah data berhasil di tambahkan atau tidak
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil dimasukkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal dimasukkan!');
            document.location.href = 'daftar.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="kotak_log">
        <p class="tulisan_log">Silahkan Login</p>
        <form action="" method="POST">
            <div>
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form_login" name="nama_lengkap" placeholder="Masukkan Username">
            </div>
            <div>
                <label for="username">Username</label>
                <input type="text" class="form_login" name="username" placeholder="Masukkan Username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" class="form_login" name="password" placeholder="Masukkan Password">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" class="form_login" name="email" placeholder="Masukkan Email">
            </div>

            <input type="submit" class="login" name="submit" value="submit">
            <center>
                <p>by Yusuf Bagus Sungging Herlambang | V3420077</p>
            </center>
        </form>
    </div>
</body>

</html>