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
				session_start();
				//jika sudah login maka akan dialihkan ke home
				if (!empty($_SESSION['login'])) {
					header("Location:index.php");
				}
				include "koneksi.php";
				if (isset($_POST['login'])) {
					$Username = $_POST['Username'];
					$Password = $_POST['Password'];
					//cek user terdaftar dan aktif
					$sql_cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $Username . "' AND password='" . $Password . "' AND aktif='1'") or die(mysqli_error($koneksi));
					$r_cek = mysqli_fetch_array($sql_cek);
					$jml_data = mysqli_num_rows($sql_cek);
					if ($jml_data > 0) {
						//buat session login dan redirect ke halaman utama
						$_SESSION['login'] = md5($r_cek['username']);
						$_SESSION['username'] = $r_cek['username'];
						$_SESSION['nama'] = $r_cek['nama'];
						header("Location:index.php");
					} else {
						//data tidak di temukan
						echo '<div class="alert alert-warning">
                        Username dan Password anda salah!
                        </div>';
					}
				}

				?>
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-33">
						Silahkan Login
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

					<div class="container-login100-form-btn m-t-20">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center">
						<span class="txt1">
							Belum punya akun?
						</span>
						<a href="register.php" class="txt2 hov1">
							Registrasi
						</a>
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
	<script language="javascript" src="./mask.js"></script>
</body>

</html>