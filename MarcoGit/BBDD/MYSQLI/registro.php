
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
                <form action="conexion.php" method="post">
                    <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                        <input type="text" name="name" id="txtNombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                    <label for="gg"><strong>Escriba su contraseña:</strong></label>
                        <input type="password" name="password" id="gg" value="<?php if(isset($_POST['contrasenia'])){echo $_POST['contrasenia'];} ?>"><br><br>

                    <input type="submit" value="enviar">
                </form>
            <?php
        }
    ?>
    

</body>
</html>


