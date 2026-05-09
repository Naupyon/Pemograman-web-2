<html>
<head>
    <title>manipulasi string</title>
    <style>
        body {
            font-family: serif;
        }
    </style>
</head>
<body>

<form method="POST" action="">
    <input type="text" name="string_input" required>
    <button type="submit" name="submit">submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $input = $_POST['string_input'];
    
    $panjang = strlen($input);

    echo "<h3>Input:</h3>";
    echo $input . "<br>";

    echo "<h3>Output:</h3>";
    
    for ($i = 0; $i < $panjang; $i++) {
        
        $char = $input[$i];
        
        for ($j = 0; $j < $panjang; $j++) {
            
            if ($j == 0) {
                echo strtoupper($char);
            } else {
                echo strtolower($char);
            }
        }
    }
}
?>
</body>
</html>