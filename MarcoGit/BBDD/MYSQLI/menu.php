
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

        mostrarFormulario();

        function mostrarFormulario( ){
            ?>
            <h1> Hola <?php echo $_COOKIE['usuario'];?></h1><br>
                <p>Elija una opción</p>
                <a href="formCambioPWD.php">Cambiar contraseña</a>
                <a href="mostrarNombreClave.php">Ver su nombre y clave</a>
            <?php
        }
    ?>
    

</body>
</html>