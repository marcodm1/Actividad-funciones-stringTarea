
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
        if (!isset($_COOKIE['id']) ){
            mostrarFormulario();
        }

        formularioUsuario();

        function formularioUsuario(){
            ?>
            <h1> Hola</h1>
                <p>Elija una opción:</p>
                <div>
                    <li><a href="createUsuario.php">Añadir un usuario nuevo a la tabla</a></li>
                    <li><a href="readUsuario.php">  Mostrar nombres</a></li>
                    <li><a href="updateUsuario.php">Cambiar nombre de una persona</a></li>
                    <li><a href="deleteUsuario.php">Eliminar nuestra cuenta</a></li>
                </div>
            <?php
        }
    ?>
    

</body>
</html>