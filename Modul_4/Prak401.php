<html>
    <head>
        <title>
            Modul 4 Array soal 1
        </title>
        <style>
            table, tr, td {
                border: solid black 1px;
                border-collapse: collapse;
                padding-right: 6px;
                padding-left: 6px;
                padding-bottom: 6px;
                text-align: center;
            }
            form{
                margin-bottom: 10px;
            }   
        </style>
    </head>
    <body>
        <form method="post">
            <label for="length">Panjang:</label>
            <input type="text" name="length" id="length"><br>
            <label for="width">Lebar:</label>
            <input type="text" name="width" id="width"><br>
            <label for="Value">Nilai:</label>
            <input type="text" name="value" id="value"><br>
            <input type="submit" name="submission" value="Cetak">
        </form>
    
    <?php
    if(isset($_POST['submission'])){
        $length= $_POST['length'];
        $width= $_POST['width'];
        $matrix= $length*$width;

        $valueInput=$_POST['value'];
        $value=explode(" ", $valueInput);
        $totalInput=count($value);

        if($totalInput==$matrix){
            echo "<table>";
            $index=0;
            for($i=0;$i<$length;$i++){
                echo "<tr>";
                for($j=0;$j<$width;$j++){
                    echo "<td>" . $value[$index] . "</td>";
                    $index++;
                }
                echo "</tr>";
            }
            echo "</table>";
            }
        else {
            echo "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
    ?>
    </body>
</html>