
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
        mostrarFormulario();
        function mostrarFormulario( ){
            ?>
            <h1> Para conectarse a las BBDD como un usaurio</h1>
                <form action="conexion.php" method="post">
                    <label for="txtNombre">Escriba su nombre:       </label>
                        <input type="text" name="name" id="txtNombre"><br><br>
                    <label for="pwd1">Nueva contraseña:</label>
                        <input type="password" name="newPassword" id="pwd1"><br><br>
                    <label for="pwd2">Repetir nueva contraseña:</label>
                        <input type="password" name="repeatPassword" id="pwd2"><br><br>
                    
                    <input type="submit" value="enviar">
                </form>
            <?php
        }
    ?>
    

</body>
</html>


