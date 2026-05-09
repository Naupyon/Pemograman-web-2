<html>
<head>
    <title>interaksi bintang</title>
    <style>
        img { width: 50px; height: 50px; margin: 2px; }
        form { margin-bottom: 20px; }
        .bintang-container { margin: 15px 0; }
    </style>
</head>
<body>
<?php
$jumlah = 0;
$url_bintang = "bintang.png"; 

if (isset($_POST['submit'])) {
    $jumlah = $_POST['bintang'];
} elseif (isset($_POST['tambah'])) {
    $jumlah = $_POST['jumlah_sekarang'];
    $jumlah++; 
} elseif (isset($_POST['kurang'])) {
    $jumlah = $_POST['jumlah_sekarang'];
    if ($jumlah > 0) {
        $jumlah--; 
    }
}

if ($jumlah == 0) {
?>
    <form method="POST" action="">
        Jumlah bintang <input type="number" name="bintang" min="1" required><br>
        <button type="submit" name="submit">Submit</button>
    </form>

<?php
} else {
?>
    <p>Jumlah bintang <?php echo $jumlah; ?></p>
    
    <div class="bintang-container">
        <?php
        for ($i = 1; $i <= $jumlah; $i++) {
            // Karena variabel $url_bintang sudah diubah di atas, bagian ini otomatis mengikuti
            echo "<img src='$url_bintang' alt='Bintang'>";
        }
        ?>
    </div>

    <form method="POST" action="">
        <input type="hidden" name="jumlah_sekarang" value="<?php echo $jumlah; ?>">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>

<?php
}
?>
</body>
</html>