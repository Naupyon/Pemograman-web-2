<!DOCTYPE html>
<head>
    <title>Form Input dan Output</title>
    <style>
        .error {
            color: red;
        }
        form {
            line-height: 1.5;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php
$nama = $nim = $jenis_kelamin = "";
$namaErr = $nimErr = $jkErr = "";
$berhasil = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["nama"])) {
        $namaErr = "nama tidak boleh kosong";
        $valid = false;
    } else {
        $nama = $_POST["nama"];
    }

    if (empty($_POST["nim"])) {
        $nimErr = "nim tidak boleh kosong";
        $valid = false;
    } else {
        $nim = $_POST["nim"];
    }

    if (empty($_POST["jenis_kelamin"])) {
        $jkErr = "jenis kelamin tidak boleh kosong";
        $valid = false;
    } else {
        $jenis_kelamin = $_POST["jenis_kelamin"];
    }

    if ($valid) {
        $berhasil = true;
    }
}
?>

<form method="POST" action="">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"> 
    <span class="error">* <?php echo $namaErr; ?></span><br>
    
    Nim: <input type="text" name="nim" value="<?php echo $nim; ?>"> 
    <span class="error">* <?php echo $nimErr; ?></span><br>
    
    Jenis Kelamin : <span class="error">* <?php echo $jkErr; ?></span><br>
    <input type="radio" name="jenis_kelamin" value="Laki-Laki" 
    <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Laki-Laki") echo "checked";?>> Laki-Laki<br>

    <input type="radio" name="jenis_kelamin" value="Perempuan" 
    <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked";?>> Perempuan<br>
    
    <button type="submit" name="submit">Submit</button>
</form>

<?php

if ($berhasil) {
    echo "<h2>Output:</h2>";
    echo $nama . "<br>";
    echo $nim . "<br>";
    echo $jenis_kelamin . "<br>";
}
?>
</body>
</html>