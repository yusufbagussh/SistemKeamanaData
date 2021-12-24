<?php
session_start();

// if (!isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }
if ($_SESSION['level'] == "") {
    header("location:index.php?alert=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Halaman Member</title>
</head>

<body>
    <div style="text-align:center">
        <h2>Halaman Member</h2>
        <p><a href="index.php">Home</a> / <a href="logout.php">Logout</a></p>

        <p>Selamat datang di halaman Member, Anda Login dengan username <?php echo $_SESSION['username']; ?></p>
    </div>
</body>

</html>