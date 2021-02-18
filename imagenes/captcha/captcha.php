<?php  
// ----------- crear img con x tamaño y color de fondo
    $ancho      = 150;
    $alto       = 150;
    $imagen     = imagecreate($ancho, $alto); // crea la imagen con x caracteristicas
    $colorFondo = imagecolorallocate($imagen,255, 255, 255); // color de fondo de la img

//------------- texto y color en la img
    $letra      = 5;// tamaño de la letra del 0 al 5
    $x          = 1; // posicion donde empieza a escribir
    $y          = 1; // posicion donde empieza a escribir
    $textom      = "m";
    $textoa      = "a";
    $textor      = "r";
    $textoc      = "c";
    $textoo      = "0";
    $colorLetra = imagecolorallocate($imagen,200, 0, 200);
    imagestring($imagen, $letra, 65, 65, $textom, $colorLetra); // pinta un string en la img
    imagestring($imagen, $letra, 70, 70, $textoa, $colorLetra);
    imagestring($imagen, $letra, 75, 75, $textor, $colorLetra);
    imagestring($imagen, $letra, 80, 80, $textoc, $colorLetra);
    imagestring($imagen, $letra, 85, 85, $textoo, $colorLetra);

    header("Content-type: image/png"); // estableces que en el body va a haber una imagen png
    imagepng($imagen);
    imagedestroy($imagen);

 ?>


