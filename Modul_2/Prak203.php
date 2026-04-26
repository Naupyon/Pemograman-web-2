<!DOCTYPE html>
<html> 
<head>
    <title>Konversi suhu</title>
</head>
<body>
<?php
$nilai = isset($_POST['nilai']) ? $_POST['nilai'] : '';
$dari = isset($_POST['dari']) ? $_POST['dari'] : 'Celcius';
$ke = isset($_POST['ke']) ? $_POST['ke'] : 'Fahrenheit';
$hkonversi = " ";
$simbol = " ";

if (isset($_POST['submit']) && $nilai != ""){
    $scelcius = 0;

    switch ($dari){
        case 'Celcius':
            $scelcius = $nilai;
            break;
        case 'Fahrenheit':
            $scelcius = ($nilai - 32) * 5/9;
            break;
        case 'Rheamur':
            $scelcius = $nilai * 5/4;
            break;
        case 'Kelvin':
            $scelcius = $nilai - 273.15;
            break;
    }

    switch ($ke){
        case 'Celcius':
            $hkonversi = $scelcius;
            $simbol = "°C";
            break;
        case 'Fahrenheit':
            $hkonversi = ($scelcius * 9/5) + 32;
            $simbol = "°F";
            break;
        case 'Rheamur':
            $hkonversi = $scelcius * 4/5;
            $simbol = "°R";
            break;
        case 'Kelvin':
            $hkonversi = $scelcius + 273.15;
            $simbol= "°K";
            break;
    }
}
?>

<form method="POST" action="">
    Nilai : <input type="number" step="any" name="nilai" value="<?php echo $nilai; ?>" required><br>
    
    Dari : <br>
    <input type="radio" name="dari" value="Celcius" <?php if ($dari == 'Celcius') echo 'checked'; ?>> Celcius<br>
    <input type="radio" name="dari" value="Fahrenheit" <?php if ($dari == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit<br>
    <input type="radio" name="dari" value="Rheamur" <?php if ($dari == 'Rheamur') echo 'checked'; ?>> Rheamur<br>
    <input type="radio" name="dari" value="Kelvin" <?php if ($dari == 'Kelvin') echo 'checked'; ?>> Kelvin<br>
    
    Ke : <br>
    <input type="radio" name="ke" value="Celcius" <?php if ($ke == 'Celcius') echo 'checked'; ?>> Celcius<br>
    <input type="radio" name="ke" value="Fahrenheit" <?php if ($ke == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit<br>
    <input type="radio" name="ke" value="Rheamur" <?php if ($ke == 'Rheamur') echo 'checked'; ?>> Rheamur<br>
    <input type="radio" name="ke" value="Kelvin" <?php if ($ke == 'Kelvin') echo 'checked'; ?>> Kelvin<br>
    
    <button type="submit" name="submit">Konversi</button>
</form>
<?php
if (isset($_POST['submit']) && $hkonversi !== " "){
    echo "<h2>Hasil Konversi: " . round($hkonversi, 1) . " " . $simbol . "</h2>";
}
?>
</body>
</html>