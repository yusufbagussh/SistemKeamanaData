<?php
include "Bcrypt.php";
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

function resolve_login($username, $password) 
{
	include "koneksi.php";
	$bcrypt = new Bcrypt(16);
	$data = $mysqli->query("SELECT password FROM users WHERE username='$username' or email='$username'  ");
	$result=mysqli_fetch_array($data);
	$hash =$result['password'];
	return $bcrypt->verify($password, $hash);
}

if(resolve_login($username, $password)!=false):
	$login = $mysqli->query("SELECT * FROM users WHERE username='$username' or email='$username' ");
	$find=mysqli_num_rows($login);
	$result=mysqli_fetch_array($login);
	if ($find > 0):
	  session_start();
	  $_SESSION['username'];
	  $_SESSION['email'];
	  $_SESSION['username'] = $result['username'];
	  $_SESSION['email']  = $result['email'];
	  header('location:home.php');
	endif;
else:
	header('location:error.php');
endif;
