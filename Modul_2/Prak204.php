<!DOCTYPE html>
<html>
<head> 
    <title>Ejaan Bilangan</title>
    <style>
        form { margin-bottom: 20px; }
    </style>
</head>
<body>

<form method="POST" action="">
    Nilai : <input type="number" name="nilai" required><br><br>
    <button type="submit" name="submit">Konversi</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];
    $hasil = "";

    if ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai > 0 && $nilai < 10) {
        $hasil = "Satuan";
    } elseif ($nilai >= 11 && $nilai <= 19) {
        $hasil = "Belasan";
    } elseif ($nilai == 10 || ($nilai >= 20 && $nilai < 100)) {
        $hasil = "Puluhan";
    } elseif ($nilai >= 100 && $nilai < 1000) {
        $hasil = "Ratusan";
    } elseif ($nilai >= 1000) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } else {
        $hasil = "Input tidak valid";
    }

    echo "<h2>Hasil: " . $hasil . "</h2>";
}
?>
</body>
</html>