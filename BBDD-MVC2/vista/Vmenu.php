
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
        formularioUsuario();

        function formularioUsuario(){
            ?>
                <p>Elija una opción del menu:</p>
                <div>
                    <form action="../controlador/controlador.php" method="GET">
                        <input type="submit" name="menu" value="crear">
                        <input type="submit" name="menu" value="actualizar">
                        <input type="submit" name="menu" value="eliminar"><br>
                    </form> 
                </div>
            <?php
        }
    ?>

</body>
</html>