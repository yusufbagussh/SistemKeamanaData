<?php

session_start();

require 'functions.php';

if (isset($_POST["login"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_md5 = md5($password);
    $pin = $_POST['pin'];
    $pin_sha1 = sha1($pin);

    $result = mysqli_query($conn, "SELECT * FROM tb_akunsiswa WHERE email = '$email'");
    $rows = mysqli_fetch_assoc($result);

    include "lib.php";
    $enkripsi = str_replace(" ", "", $rows['enkripsi']);
    $panjang_kunci = strlen($pin);
    $panjang_ciper = strlen($enkripsi);
    $index_x = 0;
    $index_y = 0;
    $hasil_konversi = array();
    $dekripsi = "";
    while ($index_x < $panjang_ciper) {
        $x = substr($enkripsi, $index_x, 1);
        $y = substr($pin, $index_y, 1);
        $konversi_x = huruf_ke_angka($x);
        $konversi_y = $y;
        if ($konversi_x >= $konversi_y) {
            $hasil = $konversi_x - $konversi_y;
        } else {
            $hasil = $konversi_x + (26 - $konversi_y);
        }
        $hasil_konversi[$index_x] = angka_ke_huruf($hasil);
        $index_x++;
        $index_y++;
        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }
    $i = 0;
    while ($i < $index_x) {
        $dekripsi .= $hasil_konversi[$i];
        $i++;
    }

    if (mysqli_num_rows($result)) {

        if ($password_md5 == $rows['password_md5']) {

            if ($pin_sha1 == $rows['pin_sha1']) {

                if ($dekripsi == $rows['username']) {
                    echo "
                    <script>
                        alert('Login Berhasil')
                    </script>
                    ";

                    $_SESSION["login"] = true;
                    header("Location: siswa\index.php?nis=$rows[nis]");
                    exit;
                }
            }
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Login</title>

    <style>
        body {
            background-color: corals;
            width: 30rem;
            margin-left: auto;
            margin-right: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        .checkbox {
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>

    <br>

    <div>
        <h1 class="h3 mb- fw-normal text-center">Masuk</h1>
    </div>

    <br>

    <main class="form-signin">
        <form action="" method="POST">
            <div class="mb-3 row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pin" class="col-sm-3 col-form-label">Pin</label>
                <div class="col-sm-9">
                    <input type="password" name="pin" class="form-control" id="pin" placeholder="6 digit angka" onkeypress="return hanyaAngka(event)" minlength="6" maxlength="6" required autofocus>
                </div>
            </div>
            <?php if (isset($error)) : ?>
                <div class="row">
                    <label for="error" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <p style="color:red; font-style:italic;">email atau password atau pin salah</p>
                    </div>
                </div>
            <?php endif ?>
            <div class="checkbox">
                <label for="setcookie">
                    <input type="checkbox" name="setcookie" value="true" id="setcookie"> Ingat Saya
                </label>
            </div>
            <div class="form" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">
                <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
                <a href="index.php" role="button" class="w-100 btn btn-lg btn-warning" style="color: white;" type="submit">Cancel</a>
            </div>
            <div class="checkbox">
                Belum memiliki akun? <a href="registrasi.php" style="text-decoration: none;" class="link-danger">Registrasi di sini!</a>
            </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; SIAKAD by Mu'adz</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>