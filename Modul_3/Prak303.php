<html>
<head>
    <title>do while deret bintang</title>
    <style>
        form { margin-bottom: 20px; line-height: 1.6; }
        img { width: 20px; height: 20px; vertical-align: middle; margin: 0 3px; }
    </style>
</head>
<body>
<?php
$bawah = isset($_POST['bawah']) ? $_POST['bawah'] : '';
$atas = isset($_POST['atas']) ? $_POST['atas'] : '';
?>

<form method="POST" action="">
    Batas Bawah : <input type="number" name="bawah" value="<?php echo $bawah; ?>" required><br>
    Batas Atas : <input type="number" name="atas" value="<?php echo $atas; ?>" required><br>
    <button type="submit" name="submit">Cetak</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $i = $_POST['bawah'];
    $batas_atas = $_POST['atas'];

    if ($i <= $batas_atas) {
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='bintang.png' alt='Bintang'>";
            } else {
                echo $i;
            }

            echo " ";
            $i++;
        } while ($i <= $batas_atas);
    } else {
        echo "Batas bawah tidak boleh lebih besar dari batas atas.";
    }
}
?>
</body>
</html>