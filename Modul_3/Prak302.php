<html>
<head>
    <title>setengah segitiga</title>
    <style>
        img {
            width: 40px;
            height: 40px;
            margin: 2px;
        }
    </style>
</head>
<body>
    <form method="post">
        Tinggi: <input type="number" name="tinggi" required><br><br>
        Alamat Gambar: <input type="url" name="url" required> <br><br>
        <button type="submit" name="submit">Cetak</button>
    </form>
    <br>

<?php
if (isset($_POST['submit'])){
    $tinggi = $_POST['tinggi'];
    $url = $_POST['url'];
    
    $i = 1;
    
    while ($i <= $tinggi) {
        $spasi = 1;
        while ($spasi < $i) {
            echo "<img src='$url' style='visibility: hidden;'>";
            $spasi++;
        }
        
        $gambar = 1;
        while ($gambar <= ($tinggi - $i + 1)) {
            echo "<img src='$url'>";
            $gambar++;
        }
        
        echo "<br>";
        
        $i++;
    }
}
?>
</body>
</html>