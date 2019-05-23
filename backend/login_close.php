<?php

session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");

if ($conn->connect_error) {
    die("Algo fallo en la conexion!".$conn->connect_error);
}

session_unset();
session_destroy();

header("Location: ../frontend/login1.php");

?>