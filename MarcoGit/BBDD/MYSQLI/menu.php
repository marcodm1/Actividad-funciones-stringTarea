
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
        if (!isset($_COOKIE['name'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
        }

        formularioUsuario();

        function formularioUsuario(){
            ?>
            <h1> Hola <?php echo $_COOKIE['usuario'];?></h1>
                <p>Elija una opción:</p>
                <div>
                    <li><a href="formCambioPWD.php">Cambiar contraseña</a></li>
                    <li><a href="mostrarInfo.php">Ver su informacion</a></li>
                </div>
            <?php
        }
    ?>
    

</body>
</html>