<!DOCTYPE html>
dese clase
<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="mensajes.css">
        <title>xxx.html</title>
    </head>
    <body>
        <?php 
            echo '
                <div class="cuenta">
                    <h3 class="parte1"><strong>Identificador de usuario</strong></h3>
        
                    <form action="mensajes.php" method="get" class="formulario">
                    
                    <label for="txtNumero1" ><strong>Nombre:</strong></label>
                    <input type="text" name="nombre" id="txtNumero1" class="cuadradoNombre"><br><br>
        
                    <label for="txtNumero2"><strong>Password:</strong></label>
                    <input type="text" name="contrasenia" id="txtNumero2" class="cuadradoContraseña"><br><br>
        
                    <input type="submit" value="Entrar" class="entrar"><br><br>
                    </form> 
                </div>';
        ?>
    </body>
</html>