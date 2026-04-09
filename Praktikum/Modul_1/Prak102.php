<?php
$jari_jari = 4.2;
$tinggi = 5.4;
$panjang = 8.9;
$lebar = 14.7;
$sisa = 7.9;

$volume = 0.5 * $panjang * $lebar * $tinggi;

echo number_format($volume, 3, '.', '') . " m3";
?>