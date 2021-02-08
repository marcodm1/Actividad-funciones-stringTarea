
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
        if (!isset($_COOKIE['name']) && isset($_COOKIE['password'])){
            header("Location:logearse.php");
        }

        formularioUsuario();

        function formularioUsuario(){
            ?>
            <h1> Hola <?php echo $_COOKIE['name'];?></h1>
                <p>Elija una opción:</p>
                <div>
                    <li><a href="createUsuario.php">Añadir un usuario nuevo a la tabla</a></li>
                    <li><a href="readUsuario.php">  Mostrar nombres</a></li>
                    <li><a href="updateUsuario.php">Cambiar contraseña</a></li>
                    <li><a href="deleteUsuario.php">Elimina un usuario</a></li>
                </div>
            <?php
        }
    ?>
    

</body>
</html>