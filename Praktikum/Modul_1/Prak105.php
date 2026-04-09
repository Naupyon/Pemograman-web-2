<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone</title>
    <style>

        table {
            border-collapse: separate;
            border: 1px solid black;
            border-spacing: 2px;
        }
        th, td {
            font-family: 'Times New Roman';
            border: 1px solid black;
            text-align: left;
        }
        th {
            font-weight: bold;
            background-color: red;
        }
    </style>
</head>
<body>
    
<?php
$daftar_smartphone = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<table>
        <tr>
            <th><h2>Daftar Smartphone Samsung</h2></th>
        </tr>
        <?php
        foreach ($daftar_smartphone as $smartphone) {
            echo "<tr>";
            echo "<td>" . $smartphone . "</td>";
            echo "</tr>";
        }
        ?>
</table>
</body>
</html>