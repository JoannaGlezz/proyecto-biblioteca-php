<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Registro Nuevo</title>
</head>

<body style="background-image: url(../style/images/pattern.png)">

    <?php
    $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
    $conn->query("SET NAMES utf8");

    if ($conn->connect_error) {
        die("Algo fallo en la conexion!" . $conn->connect_error);
    }

    ?>

    <form class="forms" method="post" action="../backend/register_link.php">

        <h1 class="titulo_secundario">Nuevo registro</h1>

        <label>Ingresa Matricula:</label>
        <br>
        <input name="toma_matricula" type="text" placeholder="Matricula">
        <br>
        <br>
        <button style="background-color: grey"><a href='./new_reg.php'>Enviar</a></button>

    </form>

</body>

</html>