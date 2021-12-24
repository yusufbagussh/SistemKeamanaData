<?php
$key = $_GET["key"];
$nmfile = "enkripsi.txt";
$fp = fopen($nmfile, "r"); //buka file hasil enkripsi
$isi = fread($fp, filesize($nmfile));

for ($i = 0; $i < strlen($isi); $i++) {
    $kode[$i] = ord($isi[$i]); //rubah ASCII ke desimal
    $b[$i] = ($kode[$i] - $key) % 256;
    $c[$i] = chr($b[$i]);
}
echo "Kalimat Chipper Text : ";
for ($i = 0; $i < strlen($isi); $i++) {
    echo $isi[$i];
}
echo "<br>";
echo "Hasil Deskripsi : ";
for ($i = 0; $i < strlen($isi); $i++) {
    echo $c[$i];
}
echo "<br>";
