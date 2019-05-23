<?php
session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die("Algo fallo en la conexion!".$conn->connect_error);
}

echo "<h2>Inicio de Sesion</h2>";
echo "<h3 >Hola ".$_SESSION["usuarios"]."</h3>";
echo "<button><a href='../backend/login_open.php'>Ver mi sesion</a></button>";

?>