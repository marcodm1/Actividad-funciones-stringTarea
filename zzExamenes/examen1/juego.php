<?php
    $ARCHIVO = file_get_contents("usuarios.txt"); // devuelve un string lineal de todo el archivo
    $nombres = explode("|", $ARCHIVO);
    var_dump($nombres);
    

?>