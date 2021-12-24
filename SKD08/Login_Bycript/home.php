<!--
Author : Aguzrybudy
Created : Jum'at, 14-April-2017
Title : Login dengan Bcrypt
-->

<?php
session_start();
if (!empty($_SESSION['username'])) :
?>

	<!DOCTYPE html>
	<html lang="">

	<head>
		<!-- Required meta tags always come first -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Secure Login PHP</title>

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<style>
			#wrapper {
				position: relative;
				display: block;
				margin: auto;
				background: #f5f5f5;
				width: 500px;
				height: auto;
				padding: 30px;
				margin-top: 5%;
			}

			#wrapper h3 {
				margin-top: 0px;
			}
		</style>
	</head>

	<body>


		<div id="wrapper" class="card w-75">
			<h2>Selamat Datang</h2>
			<h3>Username : <?php echo $_SESSION['username']; ?></h3>
			<h3>Email : <?php echo $_SESSION['email']; ?></h3>
			<a href="logout.php" class="btn btn-warning">Logout</a>
		</div>

		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>

	</html>

<?php
else :
	header('location:index.php');
endif;
?>