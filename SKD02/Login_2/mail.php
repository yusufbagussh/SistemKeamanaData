<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";
$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
//ganti dengan email dan password yang akan di gunakan sebagai email pengirim
$mail->Username = 'yusufbagus063@gmail.com';
$mail->Password = 'bagus57552';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
//ganti dengan email yg akan di gunakan sebagai email pengirim
$mail->setFrom('yusufbagus063@gmail.com', 'Yusuf Bagus');
$mail->addAddress($_POST['Email'], $_POST['Nama']);
$mail->isHTML(true);
$mail->Subject = "Aktivasi pendaftaran Member";
$mail->Body = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
 <a href='http://localhost/registrasiemail/activation.php?t=" . $token . "'>http://localhost/registrasiemail/activation.php?t=" . $token . "</a>  ";
$mail->send();
echo 'Message has been sent';
