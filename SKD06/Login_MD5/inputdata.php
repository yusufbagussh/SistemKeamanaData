<?php
require('koneksi.php');

function registrasi($data)
{
    global $conn;
    $nama_lengkap = $data["nama_lengkap"];
    $username = $data["username"];
    $password = $data["password"];
    $password_md5 = md5($password);
    $email = $data["email"];

    //cek username sudah ada atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('username sudah terdaftar!');
        </script>";
        return false;
    }

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama_lengkap', '$username', '$password_md5', '$email')");

    return mysqli_affected_rows($conn);

    echo "<script>
        alert('user baru berhasil ditambahkan');
        document.location.href = 'login.php';
        </script>";
}
