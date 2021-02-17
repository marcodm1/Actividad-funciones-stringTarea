<?php  
// ----------- tamaño de la img
    $ancho  = 300;
    $alto   = 300;
    $imagen = imagecreate($ancho, $alto);
    $colorFondo  = imagecolorallocate($imagen,0, 100, 0); // color de fondo

//------------- texto y color en la img
    $letra  = 10; // tamaño de la letra
    $x      = 1; // posicion donde empieza a escribir
    $y      = 1; // posicion donde empieza a escribir
    $texto  = "Blanco: usuario y Negro: relleno";
    $colorLetra = imagecolorallocate($imagen,200, 0, 200);
    imagestring($imagen, $letra, $x, $y, $texto, $colorLetra); // pinta un string en la img

//------------- un circulo en la img pedida por el usuario
    $colorCirculoGet = imagecolorallocate($imagen, 255, 255, 255);
    $xc = 150; // la coordenada en x del centro
    $yc = 150; // la coordenada en y del centro
    $gi = 1; // donde inicia el arco
    $gf = (360*$_POST['porcentaje'])/100; // donde termina el arco
    imagearc($imagen, $xc, $yc, $ancho, $alto, $gi, $gf, $colorCirculoGet); // pinta un arco

//------------- un circulo en la img rellenada automaticamente
    $colorAutomatico = imagecolorallocate($imagen,0, 0, 0); 
    $xc = 150; // la coordenada en x del centro
    $yc = 150; // la coordenada en y del centro
    $gi = (360*$_POST['porcentaje'])/100; // donde inicia el arco
    $gf = 360; // donde termina el arco
    imagearc($imagen, $xc, $yc, $ancho, $alto, $gi, $gf, $colorAutomatico); // pinta un arco


    header("Content-type: image/png"); // estableces que en el body va a haber una imagen png
    imagepng($imagen);
    imagedestroy($imagen);
 ?>

  