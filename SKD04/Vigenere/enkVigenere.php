<?php
$kalimat = $_GET["kata"];
$kunci = $_GET["key"];
// $kalimat = "SISTEMKEAMANANDATA";
// $kunci = "DATA";
$plain_text = str_split($kalimat); //untuk mecah array
$n = count($plain_text); //count untuk menghitung array
$key = str_split($kunci);
$m = count($key);
$batas_atas = 65;
$batas_bawah = 97;
$encrypted_text = '';
// if ($key[0])
for ($i = 0; $i < $n; $i++) {
    $cipher[$i] = ord($plain_text[$i]);
    // if($cipher[$i] < 65)
    if ($cipher[$i] >= 65 &&  $cipher[$i] <= 90) {
        $encrypted_text .= chr(((ord($plain_text[$i]) - $batas_atas
            + ord($key[$i % $m]) - $batas_atas) % 26) + $batas_atas);
    } else if ($cipher[$i] >= 97 &&  $cipher[$i] <= 122) {
        $encrypted_text .= chr(((ord($plain_text[$i]) - $batas_bawah
            + ord($key[$i % $m]) - $batas_bawah) % 26) + $batas_bawah);
    }
}

//digabungkan proses enkripsi
echo "kalimat asli : ";
for ($i = 0; $i < $n; $i++) {
    echo $kalimat[$i];
}
echo "<br>";
echo "kalimat hasil enkripsi : ";
echo $encrypted_text;

echo "<br>";
//simpan data di file
$fp = fopen("enkripsi.txt", "w");
fputs($fp, $encrypted_text);
fclose($fp);
