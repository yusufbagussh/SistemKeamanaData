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
        <form action="ceklog.php" method="POST">

            <div>
                <label for="username">Username</label>
                <input type="text" class="form_login" name="username" placeholder="Masukkan Username">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" class="form_login" name="password" placeholder="Masukkan Password">
            </div>

            <input type="submit" class="login" name="login" value="login">
            <center>
                <p>by Yusuf Bagus Sungging Herlambang | V3420077</p>
            </center>
        </form>
    </div>
</body>

</html>