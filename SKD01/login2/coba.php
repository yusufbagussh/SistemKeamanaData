<?php
session_start();
require('koneksi.php');

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = mysqli_query($conn, "SELECT role, password FROM tabel_login WHERE username = '$username'");

    if (mysqli_num_rows($data) == 0) {
        echo '
        <script>
          alert("Username yang Anda Masukkan Salah!"); document.location="index.php";
        </script>';
    } else {
        $cek = mysqli_fetch_assoc($data);
        $password = $cek['password'];
        $role = $cek['role'];
        if ($password == $password) {
            if ($role == "Admin") {
                $_SESSION['admin'] = $username;
                echo
                '<script>
                    alert("Login Berhasil!");
                    document.location="admin.php";
                </script>';
            } else {
                $_SESSION['mahasiswa'] = $username;
                echo '
                <script>
                    alert("Login Berhasil!"); 
                    document.location="mahasiswa.php";
                </script>';
            }
        } else {
            echo
            '<script>
                    alert("Password yang Anda Masukkan Salah!");
                    document.location="index.php";
            </script>';
        }
    }
}
