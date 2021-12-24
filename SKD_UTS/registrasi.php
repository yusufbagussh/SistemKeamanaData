<?php

require 'functions.php';

if (isset($_POST["registrasi"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Registrasi berhasil');
            document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Registrasi</title>

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
    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h3 mb- fw-normal text-center">Registrasi</h1>
            <br>
            <div class="mb-3 row">
                <label for="username" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" id="username" placeholder="username" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="nama lengkap" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="4 - 12 digit karakter" minlength="4" maxlength="12" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password2" class="col-sm-4 col-form-label">Re-type Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password2" class="form-control" id="password2" placeholder="4 - 12 digit karakter" minlength="4" maxlength="12" required autofocus>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pin" class="col-sm-4 col-form-label">Pin</label>
                <div class="col-sm-8">
                    <input type="password" name="pin" class="form-control" id="pin" placeholder="6 digit angka" onkeypress="return hanyaAngka(event)"  minlength="6" maxlength="6" required autofocus>
                </div>
            </div>
            <!-- <div class="mb-3 row">
                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <textarea name="alamat" class="form-control" id="alamat" placeholder="alamat" required autofocus></textarea>
                </div>
            </div> -->
            <div class="mb-3 row">
                <input type="hidden" name="posisi" class="form-control" id="posisi" value="siswa" required autofocus>
            </div>
            <div class="form" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">
                <button class="w-100 btn btn-lg btn-primary" name="registrasi" type="submit">Register</button>
                <a href="index.php" role="button" class="w-100 btn btn-lg btn-warning" style="color: white;" type="submit">Cancel</a>
            </div>
            <div class="checkbox">
                Sudah Punya Akun? <a href="login.php" style="text-decoration: none;" class="link-primary">Masuk!</a>
            </div>
            <p class="mt-5 mb-3 text-muted text-center">&copy; SIAKAD by Mu'adz</p>
        </form>
        <script>
            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>
    </main>
</body>

</html>