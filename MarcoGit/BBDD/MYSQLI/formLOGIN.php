
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
        if (isset($_POST['name']) && isset($_POST['password'])){
            echo "Error: algun dato introducido no es correcto.";
        }

        mostrarFormulario();
        function mostrarFormulario( ){
            ?>
            <h1> Para conectarse a las BBDD como un usaurio</h1>
                <form action="connLOGIN.php" method="post">
                    <label for="txtNombre">Nombre:</label>
                        <input type="text" name="name" id="txtNombre"><br><br>
                    <label for="pwd"> Contraseña:</label>
                        <input type="password" name="password" id="pwd"><br><br>
                 
                    <input type="submit" value="enviar">
                </form>
            <?php
        }
    ?>
    

</body>
</html>