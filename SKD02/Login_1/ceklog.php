<?php

session_start();

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

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
            $_SESSION['role'] = "admin";
            $_SESSION['username'] = $username;
            echo
            '<script>
                alert("Anda berhasil Login sebagai Admin!"); 
                document.location="admin.php";
            </script>';
            // if (isset($_SESSION["login"])) {
            //     header("Location: admin.php");
            //     exit;
            // }
            header("location:admin.php");
        } else {
            $_SESSION['role'] = "member";
            $_SESSION['username'] = $username;
            echo
            '<script>
                alert("Anda berhasil Login sebagai Member!"); 
                //document.location="member.php";
            </script>';
            // if (isset($_SESSION["login"])) {
            //     header("Location: member.php");
            //     exit;
            // }
            header("location:member.php");
        }
    }
}
