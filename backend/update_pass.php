<?php

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn -> query("SET NAMES utf8");


if($conn -> connect_error) {
    die("Oops!, Algo falló...".$conn -> connect_error);
}

//CORREGIR VARIABLES
$id = $_POST["matricula"];
$user = $_POST["user"];
$newPassword = $_POST["temp_pass"];

$sql6 = "UPDATE users SET user_password='$newPassword' WHERE user_login = '$user'";
$sql7 = "UPDATE user_pass_tmp SET status=1 WHERE user_login = '$user'";
$sql8 = "UPDATE user_pass_tmp SET pass_tmp='$newPassword' WHERE user_login = '$user'";

if ($conn->query($sql6) === TRUE && $conn->query($sql7) === TRUE && $conn->query($sql8) === TRUE) {
    echo "Contraseña actualizada correctamente";
} else {
    echo "Error actualizando contraseña. ".$conn->error;
}  

?>