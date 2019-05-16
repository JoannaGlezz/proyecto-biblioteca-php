<?php
   
        $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
        $conn -> query("SET NAMES utf8"); 
        
    if($conn -> connect_error) {
        die("Oops!, Algo falló...".$conn -> connect_error);
    }

            $titulo = $_POST["titulo"];    
            $isbn = $_POST["isbn"]; 
            $autores = $_POST["autores"];
            $categoria = $_POST["categoria"];
            $editorial = $_POST["editorial"];
            $stock = $_POST["stock"];
            
            $sql = "INSERT INTO libro VALUES ('0', '$titulo', '$isbn', '$autores', '$categoria', '$editorial', '$stock')";

            echo "<button><a href='../frontend/consultaLibros.php'>Regresar</a></button>";


            if($conn -> query($sql) === TRUE) {
                echo "Registro modifcado satisfactoriamente";
            }else {
                echo "Algo salió mal".mysqli_error($conn);
            }
         
?>