<?php
require 'koneksi.php';

session_start();

if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];
    $data = mysqli_query($conn, "SELECT role,password FROM user WHERE username = '$user'");
    if (mysqli_num_rows($data) == 0) {
        echo 'User tidak ditemukan';
    } else {
        $cek = mysqli_fetch_assoc($data);
        $password = $cek['password'];
        $role = $cek['role'];
        if ($password == $pass) {
            if ($role == "admin") {
                $_SESSION['admin'] = $user;
                echo
                '<script>
                    alert("Anda berhasil Login Admin!");
                    document.location="admin.php";
                </script>';
            } else {
                $_SESSION['member'] = $user;
                echo '
                <script>
                    alert("Anda berhasil Login Member!"); 
                    document.location="member.php";
                </script>';
            }
        } else {
            echo
            '<script>
                    alert("Password yang Anda masukkan salah!");
                    document.location="index.php";
            </script>';
        }
    }
}
