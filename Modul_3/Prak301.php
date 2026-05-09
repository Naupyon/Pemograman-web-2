<html>
<head>
    <title>perulangan</title>
    
    <style>
    .genap{
        color : green;
        font_weight: bold;
    }
    .ganjil{
        color: red;
        font_weight: bold;
    }
    </style>
</head>
<body>
    <form method= "post">
        Jumlah peserta <input type="text" name="jumlah"><br>
        <button type="submit" name="submit">Cetak</button>
    </form>

<?php
if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];

    $i =1;
    while ( $i <= $jumlah) {
        if ($i % 2 == 0) { ?>
        <span class="genap">
                Peserta ke-<?= $i ?> <br>
            </span> <br>
<?php 
        } else { ?>
            <span class="ganjil">
                Peserta ke-<?= $i ?> <br>
            </span> <br>
<?php
        } 
        $i++;
    }
}
?>
</body>
</html>