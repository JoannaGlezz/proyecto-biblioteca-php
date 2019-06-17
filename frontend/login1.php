<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Login</title>
</head>



<body style="background-image: url(../style/images/pattern.png)">

    <?php
    $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
    $conn->query("SET NAMES utf8");

    if ($conn->connect_error) {
        die("Algo fallo en la conexion!" . $conn->connect_error);
    }

    ?>

    <h1 class="titulo_secundario">Login</h1>

    <form class="forms" method="post" action='../backend/login2.php'>
        <div>
            <label>User:</label>
            <input name="usuario" type="text" placeholder="nombre de usuario">
        </div>
            <br>
        <div>
            <label>Pass:</label>
            <input name="pass" type="password" placeholder="password">
        </div>
        <br>

        <button type="submit" style="background-color: grey">Ingresar</button>

        <div>
            <h5>
                <a href="./new_register1.php">Voy a registrarme
            </h5>

            <h5>
                <a href="./recuperar_pass.php">Olvide mi contraseña
            </h5>
        </div>

        <div>
            <button style="background-color: grey">
            <a href='inicio.php'>Regresar</a></button>
        </div>

    </form>

</body>

</html>