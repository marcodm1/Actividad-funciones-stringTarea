<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="mensajes.css">
        <title>xxx.html</title>
    </head>
    <body>
           
        <?php 
            $mensajesPHP = $_SERVER['REQUEST_URI'];
            if (isset($_GET['nombre']) && isset($_GET['contrasenia'])) {
                if (strlen($_GET['nombre']) >= 5 && strrev($_GET['contrasenia']) == $_GET['nombre']){
                    echo '
                        <div class="cuenta">
                            <p class="texto">Bienvenido al foro ' .  $_GET['nombre'] . ':
                                Por favor indique el tema sobre el que realiza su
                                comentario, gracias. 
                            </p>
                    
                            <form action="zzz.php" method="get" class="formulario">
                              
                                <label for="txtNumero1" ><strong>Tema:</strong></label>
                                <input type="text" name="tema" id="txtNumero1" class="cuadroTema"><br><br>

                                <label for="txtNumero2"><strong>Comentarios:</strong></label>
                                <textarea name="comentario" cols="23" rows="2"></textarea>

                                <input type="submit" value="Detalles" class="detalles"><br><br>
                                
                                <input type="hidden" name="nombre"      value="'.$_GET['nombre'].'" />
                                <input type="hidden" name="contrasenia" value="'.$_GET['contrasenia'].'" />

                                <a href="http://localhost/Marco/xxx.php">Terminar</a> 
                                <a href="http://localhost/Marco/mensajes.php?nombre=' . $_GET['nombre'] . '&contrasenia=' . $_GET['contrasenia'] . '">Nueva Opinion</a> 
                            </form> 
                        </div>';
                } else {
                    echo "Usuario o contrasenia incorrecto";
                }
            }          
        ?>
    </body>
</html>
