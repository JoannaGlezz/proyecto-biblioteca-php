<link href="https://fonts.googleapis.com/css?family=Merienda&display=swap" rel="stylesheet">

<body style="background-image: url(../style/images/pattern.png)">

    <?php
    session_start();

    $conn = new mysqli("192.168.64.2", "joanna", "yaya@2424", "bibliotecaCompleto");
    $conn->query("SET NAMES utf8");

    if ($conn->connect_error) {
        die("Algo fallo en la conexion!" . $conn->connect_error);
    }

    $usuario = "SELECT users.id_type FROM users JOIN users_type ON (users.id_type = users_type.type_name) WHERE users.user_login";
    $tipo = $conn->query($usuario);

    $columna = $tipo->fetch_assoc();

    // echo "<h3>Bienvenido " . $_SESSION["id_type"]."</h3>";
    echo "<h3>Hola " . $_SESSION["usuarios"]."</h3>";
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var href = <?php
                        $idType = $_SESSION['id_type'];
                        if ($idType == 'lector') {
                            echo "'../usuarios/usr_lector.php'";
                        }
                        if ($idType == 'funcionario') {
                            echo "'../usuarios/usr_func.php'";
                        }
                        if($idType == 'administrador'){
                            echo "'../usuarios/usr_admin.php'";
                        }
                        if ($idType == 'developer'){
                            echo "'../usuarios/usr_dev.php'";
                        }
                        ?>
                        ;
            var element = document.createElement("a")
            element.href = href
            element.target = 'barraIzq'
            element.click()
        });
    </script>

</body>