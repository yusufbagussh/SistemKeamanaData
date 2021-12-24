<?php
$conn = mysqli_connect("localhost", "root", "", "db_siakad");
$result = mysqli_query($conn, "SELECT * FROM tb_akunsiswa");

if (!$result) {
    echo mysqli_error($conn);
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;
    $username = strtoupper($data["username"]);
    $nama = $data["nama"];
    $email = $data["email"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $pin = $data["pin"];

    $result = mysqli_query($conn, "SELECT email FROM tb_akunsiswa WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "
            <script>
                alert('akun sudah ada')
            </script>
        ";
        return false;
    }

    include "lib.php";
    $plain = str_replace(" ", "", $username);
    $panjang_plain = strlen($plain);
    $panjang_kunci = strlen($pin);
    $index_x = 0;
    $index_y = 0;
    $hasil_ciper = array();
    $enkripsi = "";
    while ($index_x < $panjang_plain) {
        $x = substr($plain, $index_x, 1);
        $y = substr($pin, $index_y, 1);
        $hasil_ciper[$index_x] =
            $tabel_vigenere[huruf_ke_angka($x)][$y];
        $index_x++;
        $index_y++;
        if ($index_y == $panjang_kunci) {
            $index_y = 0;
        }
    }
    $i = 0;
    while ($i < $index_x) {
        $enkripsi .= $hasil_ciper[$i];
        $i++;
    }

    if ($password != $password2) {
        echo "
            <script>
                alert('konfirmasi password tidak sama')
            </script>
        ";
        return false;
    } else {
        $password_md5 = md5($password);
        $pin_sha1 = sha1($pin);
        $result = mysqli_query($conn, "INSERT INTO tb_akunsiswa Values ('', '$nama', '$username', '$email', '$password_md5', '$pin_sha1', '$enkripsi')");

        return mysqli_affected_rows($conn);
    }
}
