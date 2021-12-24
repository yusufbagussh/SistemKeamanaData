<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                <?php
                include "koneksi.php";
                if (isset($_POST['daftar'])) {
                    //ambil data dari form   
                    $Username = $_POST['Username'];
                    $Password = $_POST['Password'];
                    $Password2 = $_POST['Password2'];
                    $Nama = $_POST['Nama'];
                    $Email = $_POST['Email'];
                    $Alamat = $_POST['Alamat'];
                    // Validasi kekuatan password
                    $uppercase = preg_match('@[A-Z]@', $Password);
                    $lowercase = preg_match('@[a-z]@', $Password);
                    $number    = preg_match('@[0-9]@', $Password);
                    $specialChars = preg_match('@[^\w]@', $Password);

                    $user_cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $Username . "'");
                    $user = mysqli_num_rows($user_cek);
                    if ($user > 0) {
                        echo '<script>
                                alert("Username sudah pernah terdaftar");
                                document.location="register.php";
                                </script>';
                    } else {
                        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
                            echo 'Password setidaknya harus 8 karakter, harus memiliki huruf besar, huruf kecil, angka, dan spesial karakter.';
                        } else {
                            // echo 'Strong password. </br>';

                            //buat token
                            $token = hash('sha256', md5(date('Y-m-d')));
                            //cek user terdaftar
                            $sql_cek = mysqli_query($koneksi, "SELECT * FROM users WHERE email='" . $Email . "'");
                            $r_cek = mysqli_num_rows($sql_cek);
                            if ($Password !== $Password2) {
                                echo "<script>
                                        alert('konfirmasi password tidak sesuai');
                                    </script>";
                            } else {
                                if ($r_cek > 0) {
                                    echo '<script>
                                            alert("Email sudah pernah terdaftar");
                                            document.location="register.php";
                                        </script>';
                                } else {
                                    //jika data kosong maka insert ke tabel;
                                    //aktif =0 user belum aktif
                                    $insert = mysqli_query($koneksi, "INSERT INTO users(username,password,nama,email,alamat,token,aktif) VALUES('" . $Username . "','" . $Password . "','" . $Nama . "','" . $Email . "','" . $Alamat . "','" . $token . "','0')");
                                    //include kirim email
                                    include("mail.php");

                                    if ($insert) {
                                        echo '<div class="alert alert-success">
                                            Pendaftaran anda berhasil, silahkan cek email anda untuk aktivasi. 
                                            <a href="login.php">Login</a>
                                            </div>';
                                    }
                                }
                                return false;
                            }
                        }
                    }
                }

                ?>
                <form class="login100-form validate-form" method="POST">
                    <span class="login100-form-title p-b-33">
                        Registrasi Akun
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="Username" placeholder="Username" onkeypress="return runScript(event)">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="Password" placeholder="Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="password" name="Password2" placeholder="Konfirmasi Password">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="text" name="Nama" placeholder="Nama Lengkap">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="Email" placeholder="Email">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="wrap-input100 rs1 validate-input">
                        <input class="input100" type="text" name="Alamat" placeholder="Alammat">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-20">
                        <button type="submit" name="daftar" class="login100-form-btn">
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script src="./mask.js"></script>
</body>

</html>