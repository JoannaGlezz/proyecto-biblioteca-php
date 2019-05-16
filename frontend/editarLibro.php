<?php
if (!isset($_GET["id"])) {
    echo "No se ha definido una acción";
    exit();
}
$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die($conn->connect_error);
}

$sql = "SELECT * FROM libro WHERE id_libro=" . $_GET["id"];
$filas = $conn->query($sql);

if ($filas->num_rows === 0) {
    echo "No se encontró el libro";
    exit();
}
$fila = $filas->fetch_assoc();
echo "<form name='f1' action='../backend/updateLibro.php?id=" . $fila["id_libro"] . "' method='post'>";
echo "<table><tr>";

echo "<td>ID</td>";
echo "<td>" . $_GET["id"] . "</td></tr>";

echo "<tr><td>Título</td>";
echo "<td><input type='text' value='".$fila['titulo']."' name='tituloLibro'></td></tr>";

echo "<tr><td>ISBN</td>";
echo "<td><input type='text' value='".$fila['isbn']."' name='isbn'></td></tr>";

echo "<tr><td>Autores</td>";
echo "<td><input type='text' value='".$fila['autores']."' name='autores'></td></tr>";

echo "<tr><td>ID Categoría</td>";
echo "<td><input type='text' value='".$fila['id_categoria']."' name='categoria'></td></tr>";

echo "<tr><td>ID Editorial</td>";
echo "<td><input type='text' value='".$fila['id_editorial']."' name='editorial'></td></tr>";

echo "<tr><td>Stock</td>";
echo "<td><input type='text' value='".$fila['stock']."' name='stock'></td></tr>";

echo "</table>";
echo "<br>";

echo "<button type='submit'>Continuar</button>";

echo "</form>";

mysqli_close($conn);

?>