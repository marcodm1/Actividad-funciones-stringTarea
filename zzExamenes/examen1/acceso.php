<?php

if (isset($_POST['nombre'])) {
    $encontrado = comprobarUsuario();
    if ($encontrado) {
        setcookie("nombre", $_POST['nombre'], time() +60);
    }
    
}else {
    mostrarFormulario(); 
}

    function mostrarFormulario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="txtNombre">Escriba su nombre:</label>
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
        <?php
    }


function comprobarUsuario() {
    $nombre  = $_POST['nombre'];
    $ARCHIVO = file_get_contents("usuarios.txt"); // devuelve un string lineal de todo el archivo
    $nombres = explode("|", $ARCHIVO);

    foreach ($contenido as $nombres) {
        if ($contenido == $nombre) {
            return true;
        }else {
            return false;
        }
    }
   
}
















?>

