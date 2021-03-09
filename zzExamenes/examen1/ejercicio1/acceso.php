<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['nombre'])) {
            $encontrado = comprobarUsuario();
            if ($encontrado) {
                setcookie("nombre", $_POST['nombre'], time() +60, '/', 'localhost', true);
                setcookie("nivel",  $_POST['nivel'],  time() +60, '/', 'localhost', true);
                setcookie("idioma", $_POST['idioma'], time() +60, '/', 'localhost', true);
                Header("Location:inicio.php");
            }else {
                echo "No se ha encontrado el nombre en la BD";
            }
        }else {
            mostrarFormulario(); 
        }

        function mostrarFormulario(){
            ?>
                <div class="registro">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="txtNombre">Nombre del usuario:</label>
                            <input type="text" name="nombre" id="txtNombre" value="" maxlength="30" required><br><br>

                        <label for="1">Nivel de juego </label>
                            <input type="radio" name="nivel" value="1" checked="checked">
                        <label for="2"></label> 
                            <input type="radio" name="nivel" value="2">
                        <label for="3"></label>
                            <input type="radio" name="nivel" value="3">
                        <label for="4"></label>
                            <input type="radio" name="nivel" value="4">
                        <label for="5"></label>
                            <input type="radio" name="nivel" value="5"><br>

                        <label for="idioma" >Idioma:</label>
                        <select name="idioma" id="idiomaa" required>
                            <option value="" selected>Seleccion idioma</option>
                            <option value="español">Español</option>
                            <option value="ingles">Ingles</option>
                        </select><br>
                        
                        <input type="submit" value="enviar">
                    </form>
                </div> 
            <?php
        }


        function comprobarUsuario() {
            $nombre  = $_POST['nombre'];
            $ARCHIVO = file_get_contents("usuarios.txt"); // devuelve un string lineal de todo el archivo
            $nombres = explode("|", $ARCHIVO);

            foreach ($nombres as $contenido) {
                if ($contenido == $nombre) {
                    return true;
                }else {
                    return false;
                }
            }
        
        }
?> 
</body>
</html>












