<body style="background-image: url(../style/images/pattern.png)">
<?php

session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die("Algo fallo en la conexion!".$conn->connect_error);
}

date_default_timezone_set('America/Mexico_City');
$dateToday = date("d-m-y");
$hour = date("h:i:s");

$_SESSION["inicio-dia"] = $dateToday;
$_SESSION["inicio-hora"] = $hour;


$sql3 = "SELECT user_name FROM users WHERE user_login= '".$_SESSION["usuario"]."'";
$result3 = $conn->query($sql3);
$fila3 = $result3 ->fetch_assoc();
$_SESSION["usuario"] =$fila3["user_name"];

// echo "<h4 class='titulo_secundario'> Hola  ".$_SESSION["uss"]."</h4>";
echo "<h4 class='titulo_secundario'> Sesion iniciada con el usuario : ".$_SESSION["uss"]."</h4>";
echo "<h4> Fecha: ".$_SESSION["inicio-dia"]."</h4>";
echo "<h4> Hora: ".$_SESSION["inicio-hora"]."</h4>";
// echo "<h4> Sesion completa de: ".$_SESSION["uss"]."</h4>";

// echo "<button><a  href='./login_close.php'>Finalizar Sesion</a></button>";

?>
</body>