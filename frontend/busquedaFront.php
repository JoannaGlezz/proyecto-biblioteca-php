<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/style.css">
    <title>Búsqueda</title>
</head>

<body style="background-image: url(../style/images/pattern.png)">

    <div class="login">

        <form action="../backend/busquedaBack.php" method="post">

            <h2>Búsqueda de libros</h2>

            <label>Titulo: 
            <input type="text" name="titulo" autocomplete="off">
            </label>
            <br>
            <br>
            <label>Autor: 
            <input type="text" name="autor" autocomplete="off">
            </label>
            <br>
            <br>
            <label>Categoría: 
            <select name="categoria">
            </label>

            <?php
            $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
            $conn->query("SET NAMES utf8");

            $sql = "SELECT * FROM categoria";
            $filas = $conn->query($sql);

            if ($filas->num_rows > 0) {

                echo "<option value='seleccionar' selected>Seleccione una opción</option>";
                
                while($fila = $filas->fetch_assoc()) {
                    echo "<option value='".$fila["id_categoria"]."'>".$fila["nombre"]."</option>";
                }
            }
            ?>
            
            </select><br><br>
            <button type="submit" style="background-color: grey" >Buscar</button>

        </form>

    </div>

</body>

</html>