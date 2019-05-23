<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>

<body>

    <form class="forms" method="post" action='../backend/temporalPass.php'>

        <h3 class="titulo_secundario">Recuperacion de cuenta</h3>

        <label>Matricula:
            <input name="matricula" type="text" placeholder="Matricula"><br>
        </label><br>

        <label>User:
            <input name="user" type="text" placeholder="User"><br>
        </label><br>

        <label>Pass temporal:
            <input name="temp_pass" type="password" placeholder="Pass Temporal"><br>
        </label><br>
        <br>

        <button><a href='../backend/update_pass.php'>Enviar</a></button>
    </form>

</body>

</html>