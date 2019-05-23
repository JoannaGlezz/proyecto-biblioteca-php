<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Recuperacion de cuenta</title>
</head>

<body>

    <form class="forms" method="post" action="../backend/reestablecer.php">

        <h3 class="titulo_secundario">Recuperacion de password</h3>

        <label>Ingresa Matricula: </label>
        <input name="value_matricula" type="text" placeholder="Matricula"><br>
        <br>
        <button type="submit"><a href='./msj_recup.php'>Enviar</a></button>

    </form>

</body>

</html>