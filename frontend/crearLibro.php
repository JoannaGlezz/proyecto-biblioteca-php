<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
</head>
<body>

<?php
        echo "<form  action='../backend/insertarlb.php' method='post'>";
        echo "<h2>Agregar un libro nuevo</h2>";

        echo "<table><tr>";
        
        echo "<tr><td>Titulo</td>";
        echo "<td><input type='text' name='titulo'></td></tr>";

        echo "<tr><td>ISBN</td>";
        echo "<td><input type='text' name='isbn'></td></tr>";
        
        echo "<tr><td>Autores</td>";
        echo "<td><input type='text' name='autores'></td></tr>";
        
        echo "<tr><td>ID Categoría</td>";
        echo "<td><input type='text' name='categoria'></td></tr>";
        
        echo "<tr><td>ID Editorial</td>";
        echo "<td><input type='text' name='editorial'></td></tr>";
        
        echo "<tr><td>Stock</td>";
        echo "<td><input type='text'  name='stock'></td></tr>";
        
        echo "</table>";
        echo "<br>";
        
        echo "<button type='submit'>Agregar Libro</button>";
        echo "<button><a href='./consultaLibros.php'>Regresar</a></button>";

        echo "</form>";

?>
        
</body>
</html>