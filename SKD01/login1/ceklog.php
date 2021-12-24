<?php

session_start();

require('koneksi.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = mysqli_query($conn, "SELECT role FROM user where username='$username' AND password = '$password'");
    if (mysqli_num_rows($data) == 0) {
        echo
        '<script>alert("Username atau Password yang Anda Masukkan Salah!"); document.location="index.php";</script>';
    } else {
        $row = mysqli_fetch_assoc($data);
        if ($row['role'] == "admin") {
            $_SESSION['admin'] = $username;
            echo
            '<script>
                alert("Anda berhasil Login Admin!"); 
                document.location="admin.php";
            </script>';
        } else {
            $_SESSION['member'] = $username;
            echo
            '<script">
                alert("Anda berhasil Login Member!"); 
                document.location="member.php";
            </script>';
        }
    }
}
