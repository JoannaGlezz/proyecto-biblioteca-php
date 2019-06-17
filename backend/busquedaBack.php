<?php

session_start();

// if (!isset($_GET["titulo"])) {
//     echo "No se ha definido una busqueda";
//     exit();
// }

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die($conn->connect_error);
}


$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$categoria = $_POST["categoria"];


// $detalles = "SELECT libro.detalles FROM libro";
//     $detalle = $conn->query($detalles);
//         echo ($detalle);




//TÍTULO, AUTOR Y CATEGORÍA CON DATOS
if (!empty($titulo) || !empty($autor) || $categoria !== "seleccionar") {

    $busqueda = "SELECT libro.id_libro, libro.titulo, libro.detalles FROM libro JOIN 
        (SELECT id_libro, COUNT(*) AS count FROM prestamo GROUP BY id_libro ) prestamo ON (libro.id_libro = prestamo.id_libro) 
        WHERE titulo LIKE '%$titulo%' OR autores LIKE '%$autor%' OR id_categoria = '$categoria' ORDER BY prestamo.count DESC";

    $consulta = $conn->query($busqueda);

    if ($consulta->num_rows > 0) {
        echo "<table>";

        while ($fila = $consulta->fetch_assoc()) {

        echo "<tr>";
        echo "<td>".$fila["id_libro"]."</td>";
        echo "<td>".$fila["titulo"]."</td>";
        echo "<td>".$fila["detalles"]."> D </td>";
        // echo "<td>".$fila["prestamos"]."> P </td>";
        echo "</tr>";
        }

        echo "</table>";



        // echo "<tr><td><h2>Título</h2></td></tr>";
        // echo "<tr>";
        // echo "<td><a href='detallesLb.php?id=" . $fila["id_libro"] . "'>" . $fila["titulo"] . "</a></td></tr>";
        // echo "<tr>";
        // echo "</table>";


    
    }
    echo "<button><a href='../frontend/busquedaFront.php'>Regresar a la busqueda</a></button>";

    //  else {
    //     echo "<h2>No hay registros para mostrar</h2>";
    //     echo "<button><a href='../frontend/busquedaFront.php'>Regresar a la busqueda</a></button>";
    // }
}

    

// //SOLO CATEGORIA INGRESADA
// else if ($categoria !== "seleccionar") {
//     $sql = "SELECT libro.id_libro, libro.titulo FROM libro JOIN (SELECT id_libro, COUNT(*) AS count FROM prestamos GROUP BY id_libro) prestamos ON (libro.id_libro = prestamos.id_libro) WHERE id_categoria = $categoria ORDER BY prestamos.count DESC";
    
//     //$sql = "SELECT * FROM libros WHERE id_categoria = $categoria";

//         $filas = $conn->query($sql);
//         if($filas->num_rows > 0) {
//             echo "<table class='form-session'>";
//              echo "<tr><td><h2>Título</h2></td></tr>";
//               while($fila = $filas -> fetch_assoc()) {//Te trae un row del set de los rows 
//                  echo "<tr>";
//                  echo "<td><a href='detalleporLB.php?id=".$fila["id_libro"]."'>".$fila["titulo"]."</a></td></tr>";
//              }
//              echo "<tr>";
//              echo "<td><button type='submit'><a href='../frontend/busquedaFront.php'>REGRESAR</a></button></td></tr>";
//          echo "</table>";
//      }else {
//          echo "<h2 class='center'>No hay registros para mostrar</h2>";
//          echo "<button type='submit' ><a href='busquedaFront.php'>REGRESAR</a></button>";
//      }
// }

// //TODO VACÍO
// else if ($categoria == "seleccionar" && empty($autor) && empty($titulo)) {
//     echo "<h2 class='center'>Favor de ingresar dato/s para realizar búsqueda</h2>";
//     echo "<button type='submit' ><a href='../frontend/busquedaFront.php'>REGRESAR</a></button>";
// } else {
//     echo "<h2 class='center'>Favor de ingresar por los menos 3 caracteres para realizar una búsqueda</h2>";
//     echo "<button type='submit' ><a href='../frontend/busquedaFront.php'>REGRESAR</a></button>";

?>
