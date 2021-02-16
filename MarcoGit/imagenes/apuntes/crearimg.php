<?php
    // crear imagen de distintas maneras.
    // forma 1
    $ancho   = 300;
    $alto    = 600;
    $imagen  = imagecreate($ancho , $alto);
    
    // forma 2
    $imagen2 = imagecreatefrompng("fichero.png");
    


    // darle colores
    // forma 1
    $rojo  = 255;
    $verde = 120;
    $azul  = 200;
    $color = imagecolorallocate( $imagen, $rojo, $verde, $azul);   



    // darles texto
    $tamaño = 20;
    $x      = 100;
    $y      = 50;
    $color  = "azul";
    $link   = "imagenPelota.png";
    $texto  = "Texto de la imagen";
    $angulo = 30;

    imagestring ($imagen, $tamaño, $x, $y, $texto, $color);

    imagettftext($imagen, $tamaño, $angulo, $x, $y, $color, $link, $texto);










 ?>