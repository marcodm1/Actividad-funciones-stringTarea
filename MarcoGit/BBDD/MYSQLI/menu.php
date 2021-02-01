
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="ejercicio2 unodos">
</head>
<body>
    <?php 
        if (!isset($_COOKIE['usuario'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
        }

        /*
        hacer un if, si existe cookie admin, aparecera un formulario
        y si no, aparecera otro
        */
        formularioUsuario();
        formularioAdmin();

        function formularioUsuario(){
            ?>
            <h1> Hola <?php echo $_COOKIE['usuario'];?></h1>
                <p>Elija una opción:</p>
                <div>
                    <li><a href="formCambioPWD.php">Cambiar contraseña</a></li>
                    <li><a href="mostrarNombreClave.php">Ver su nombre y clave</a></li>
                </div>
                
            <?php
        }

        function formularioAdmin(){
            ?>
                <h1> Hola señor.</h1>
                <p>Elija una opción:</p>
                <div>
                    <li><a href="x.php">Eliminar usuario</a></li>
                    <li><a href="x.php">Añadir usuario</a></li>
                    <li><a href="x.php">Añadir columna</a></li>
                    <li><a href="x.php">Eliminar columna</a></li>
                    <li><a href="x.php">Cambiar un dato de un cliente</a></li>
                </div>
                
            <?php
        }
    ?>
    

</body>
</html>