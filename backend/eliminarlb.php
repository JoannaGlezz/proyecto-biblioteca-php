<?php

$conn= new mysqli ("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");

// $sql="DELETE FROM libros WHERE id_libros=69";
$sql="DELETE FROM libro WHERE id_libro=".$_GET['id'];

echo "<button><a href='../frontend/consultaLibros.php'>Regresar</a></button>";
echo "<br>";


if($conn -> query($sql) === TRUE) {
    echo "Libro eliminado correctamente!";
} else {
    echo "Oops... Algo salio mal"."<br>".mysqli_error($conn);
}
mysqli_close($conn);

?>