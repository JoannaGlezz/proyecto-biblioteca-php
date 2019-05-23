<?php
echo 'conectado';
session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");

if($conn -> connect_error) {
    echo "conectado";
    die("Oops!, Algo falló...".$conn -> connect_error);
}


$valor = $_POST["value_matricula"];

$sql = "SELECT * FROM alumnos WHERE matricula = '$valor'";
$result_sql = $conn->query($sql);
$fila = $result_sql -> fetch_assoc();
$matricula =$fila["matricula"];


if($matricula != $valor) {
    echo "La matrícula que ingresaste es incorrecta";
    echo "<button><a href='../frontend/new_register1.php'>Volver a intentar</a></button>";

}else {
    $sql_value = "SELECT * FROM alumnos WHERE matricula = '$valor'";
    $result = $conn->query($sql_value);
    $fila2 = $result -> fetch_assoc();

    //CIFRAR EMAIL
    $email = $fila2["email"];
    $email = preg_replace('/(?:^|@).\K|\.[^@]$(SKIP)(*F)|.(?=.?\.)/', '', $email);

$sql_value2 = "SELECT * FROM alumnos WHERE matricula = '$valor'";
$result_matr = $conn->query($sql_value2);
$fila3 = $result_matr -> fetch_assoc();
$user_login =$fila3["user_login"];

date_default_timezone_set('America/Mexico_City');
    $dateToday = date("y-m-d H:i:s");
    // $dateToday = date("r");


$sql_date_gen = "INSERT INTO user_pass_tmp (user_login, status, fecha_gen) VALUES ('$user_login', 0,'$dateToday')";

if ($conn->query($sql_date_gen) === TRUE) { 
    echo "Un link de registro ha sido enviado al email " . $email. "registrado";
    echo "<button><a href='../frontend/login1.php'>Regresar</a></button>";
    }
}
?>
