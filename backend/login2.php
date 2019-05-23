<?php
session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
$conn->query("SET NAMES utf8");

if ($conn->connect_error) {
    die("Algo fallo en la conexion!".$conn->connect_error);
}


$user = $_POST['usuario'];
$password = $_POST['pass'];

$_SESSION['uss'] = $user;
$_SESSION['passw'] = $password;//SE TRAE DEL INPUT


//USURARIO QUE SE LIGA CON EL PASSWORD, TRAE EL USUARIO DONDE COINCIDA CON EL PASS
$sql = "SELECT * FROM users WHERE user_password = '".$_SESSION["passw"]."'";
$result = $conn->query($sql);

//TOMANDO EL VALOR DEL ROW VALOR USER
$fila = $result -> fetch_assoc();
$_SESSION["usuarios"] =$fila["user_login"]; //ESTA SESSIO LA TRAE L=DE LA BASE DE DATOS


//PASS CORRESPONDE A USUARIO
$sql2 = "SELECT * FROM users WHERE user_login = '".$_SESSION["uss"]."'";
$result2 = $conn->query($sql2);

//TOMANDO EL VALOR DEL ROW VALOR PASS
$fila2 = $result2 -> fetch_assoc();
$_SESSION["passwords"] =$fila2["user_password"];


//EMPTY PARA VER SI UN IMPUT ESTA VACIO EN PHP, SE USA EN FORMULARIOS
if(empty($_POST["usuario"]) || empty($_POST["pass"])  ) { //REVISA LOS NOMBRES CON LOS INPUTS NAME
    echo "Error campo vacio, favor de llenarlo correctamente...";
    echo "<br>";
    echo "<button ><a href='../frontend/login1.php'>Volver</a></button>";


}else {//si lo que trae del input es igual a lo de la base de datos entonces 
    if(($_SESSION["uss"] == $_SESSION["usuarios"]) && ($_SESSION["passw"] == $_SESSION["passwords"])) {
        
        header("Location: ../backend/home.php");
        sleep(2);
        exit();

    }else {
        echo "<h3>Error Usuario ".$_SESSION["usuarios"] ."</h3>";
        echo "<button ><a href='../frontend/login1.php'>Regresar</a></button>";
    }
}

?>