<!DOCTYPE html>
<html>
<head>
    <title>Urutan Nama</title>
</head>
<body>
<form Method="POSt">
    Nama : 1 <input type = "text" name = "nama_1"><br>
    Nama : 2 <input type = "text" name = "nama_2"><br>
    Nama : 3 <input type = "text" name = "nama_3"><br>
    <input type = "submit" name = "submit" Value = "Urutkan">
</form>
<?php
if (isset($_POST['submit'])){
    $nama_1 =$_POST['nama_1'];
    $nama_2 =$_POST['nama_2'];
    $nama_3 =$_POST['nama_3'];
}

if ($nama_1 < $nama_2 && $nama_1 < $nama_3) {
    $pertama = $nama_1;
    if ($nama_2 < $nama_3){
        $kedua = $nama_2;
        $ketiga = $nama_3;
    } else {
        $kedua = $nama_3;
        $ketiga =$nama_2;
    }
} elseif ($nama_2 < $nama_1 && $nama_2 < $nama_3) {
    $pertama = $nama_2;
    if ($nama_1 < $nama_3) {
        $kedua = $nama_1;
        $ketiga = $nama_3;
    } else {
        $kedua = $nama_3;
        $ketiga = $nama_1;
        }
    } else {
    $pertama = $nama_3;
    if ($nama_1 < $nama_2) {
        $kedua = $nama_1;
        $ketiga = $nama_2;
    } else {
        $kedua = $nama_2;
        $ketiga = $nama_1;
    }
}

echo "<tr><th>    </th></tr><br>";
echo "<tr><td>$pertama</td></tr><br>";
echo "<tr><td>$kedua</td></tr><br>";
echo "<tr><td>$ketiga</td></tr><br>";
?>
</body>
</html>