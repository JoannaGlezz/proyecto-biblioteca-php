<head>
        <link href="https://fonts.googleapis.com/css?family=Merienda&display=swap" rel="stylesheet">
</head>

<body style="background-image: url(../style/images/pattern.png)">

<?php
//EMPTY PARA VER SI UN IMPUT ESTA VACIO EN PHP, SE USA EN FORMULARIOS
if(empty($_POST["usuario"]) || empty($_POST["pass"])  ) { //REVISA LOS NOMBRES CON LOS INPUTS NAME
    echo "Error campo vacio, favor de llenarlo correctamente...";
    echo "<br>";
    echo "<button ><a href='../frontend/login1.php'>Volver</a></button>";
    exit();
}

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die("Algo fallo en la conexion!".$conn->connect_error);
}

$user = $_POST['usuario'];
$password = $_POST['pass'];

// Se filtra la tabla users por el usuario y password ingresados 
$sql = "SELECT * FROM users WHERE user_password = '".$password."' AND user_login = '".$user."'";
$result = $conn->query($sql);

//TOMANDO EL VALOR DEL ROW VALOR USER
$fila = $result -> fetch_assoc();

    if($fila['user_login'] == $user && $fila['user_password'] == $password) {
        session_start();

        $_SESSION["usuarios"] =$fila["user_login"]; //ESTA SESSIO LA TRAE L=DE LA BASE DE DATOS
        $_SESSION["id_type"] =$fila["id_type"]; //ESTA SESSIO LA TRAE L=DE LA BASE DE DATOS

        header("Location: ../backend/login_principal.php");

    }else {
        echo "<h3>Error Usuario ".$_SESSION["usuarios"] ."</h3>";
        echo "<button ><a href='../frontend/login1.php'>Regresar</a></button>";
    }


?>
</body>