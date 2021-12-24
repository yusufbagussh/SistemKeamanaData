<?php
include "Bcrypt.php";
include "koneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$bcrypt = new Bcrypt(16);
$hash = $bcrypt->hash($password);

$mysqli->query("INSERT INTO users (username,email,password) VALUES ('$username','$email','$hash')");

header('location:index.php');

/*
Untuk cek password hash
//$verify = $bcrypt->verify($password, $hash);
Untuk script update data sesuaikan dengan kondisi yang dibutuhkan
$mysqli->query("UPDATE users SET username = '$username',email = '$email',password='$hash' WHERE id = '$id'");
*/
