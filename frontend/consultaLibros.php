<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php
    $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
    $conn->query("SET NAMES utf8"); //CODIFICACION PARA CARACTERES ESPECIALES 


    if ($conn->connect_error) {
        die('Oops! Algo fallo..' . $conn->connect_error);
    }
    
    $varSele = "SELECT * FROM libro";
    $varFilas = $conn->query($varSele);

    echo "<table>";
    echo "<tr><td> Id </td> <td> Titulo </td> <td> Acciones </td></tr>";

    if ($varFilas->num_rows > 0) {
        while ($fila = $varFilas->fetch_assoc()) {
            echo "<td>" . $fila["id_libro"] . "</td>";
            echo "<td><a href='./detalleslb.php?id=" . $fila["id_libro"] . "'>" . $fila["titulo"] . "</a></td>";
            echo "<td><a href='../backend/eliminarlb.php?id=" . $fila["id_libro"] . "'>Eliminar </a>" . "</td>";
            echo "<td><a href='./editarLibro.php?id=" . $fila["id_libro"] . "'>Modificar </a>" . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        echo "<button><a href='./crearLibro.php'>Agregar Nuevo</a></button>";
    } else {
        echo "No hay registros para mostrar";
    }

    ?>

</body>

</html>