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

$sql1 = "SELECT * FROM libro WHERE id_libro=" . $_GET["id_libro"];
$filas = $conn->query($sql1);


$idLibro = $_POST["libro"];
$isbn = $_POST["isbn"];
$titulo = $_POST["tituloLibro"];
$autores = $_POST["autores"];
$categoria = $_POST["categoria"];
$editorial = $_POST["editorial"];
$stock = $_POST["stock"];

$sql = "UPDATE libro SET ";
$sql .= "titulo = '" . $titulo . "',";
$sql .= "isbn='" . $isbn . "',";
$sql .= "autores='" . $autores . "',";
$sql .= "id_categoria='" . $categoria . "',";
$sql .= "id_editorial='" . $editorial . "',";
$sql .= "stock='" . $stock . "' ";
$sql .= " WHERE id_libro = " . $idLibro;

echo "<button ><a href='../frontend/consultaLibros.php'>Aceptar</a></button>";
echo "<br>";

if ($conn->query($sql)) {
    echo "Registro modifcado satisfactoriamente";
} else {
    echo "Oops, algo salió mal" . mysqli_error($conn);
}

mysqli_close($conn);

?>
