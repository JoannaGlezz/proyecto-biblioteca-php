<?php

session_start();

$conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");

if($conn -> connect_error) {
    die("Oops!, Algo falló...".$conn -> connect_error);
}


$valor_matricula = $_POST["toma_matricula"];

$sql4 = "SELECT * FROM alumnos WHERE matricula = '$valor_matricula'";
$result4 = $conn->query($sql4);
$fila4 = $result4 -> fetch_assoc();
$matricula =$fila4["matricula"];

if($id != $matricula) {
    echo "La matrícula que ingresaste es incorrecta";
    echo "<button><a href='../frontend/new_register1.php'>Volver a intentar</a></button>";

}else {
    $sql5 = "SELECT * FROM alumnos WHERE matricula = '$valor_matricula'";
    $result5 = $conn->query($sql5);
    $fila5 = $result5 -> fetch_assoc();

    //CIFRAR EMAIL
    $email = $fila5["email"];
    $email = preg_replace('/(?:^|@).\K|\.[^@]$(SKIP)(*F)|.(?=.?\.)/', '', $email);

    echo "Un link de registro ha sido enviado al email " . $email . "registrado";
    echo "<button><a href='../frontend/login1.php'>Regresar</a></button>";
}
?>