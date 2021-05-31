<?php 
$imagen= imagecreate(500,300);
 $fondo= imagecolorallocate($imagen,100,255,255);
 
 $azul = imagecolorallocate($imagen,0,0,255);
$rojo = imagecolorallocate($imagen,255,0,0);
$verde = imagecolorallocate($imagen,0,255,0);
$blanco = imagecolorallocate($imagen,255,255,255);
$blanco2 = imagecolorallocate($imagen,250,200,155);
$blanco3 = imagecolorallocate($imagen,150,205,55);
$blanco4 = imagecolorallocate($imagen,50,150,255);
$negro = imagecolorallocate($imagen,0,0,0);


//imagestring( $imagen, tamaño, x, y, $texto, $color )
imagestring( $imagen, 5, 130, 10, "hola", $rojo);
//imagerectangle( $imagen, x0, y0, x1, y1, $color )
imagerectangle( $imagen, 20, 20, 120, 70, $azul );

//imagefilledrectangle( $imagen, x0, y0, x1, y1, $color )
imagefilledrectangle( $imagen, 20, 90, 120, 140, $verde );

//imagearc( $imagen, xc, yc, ancho, alto, gi, gf, $color)
imagearc( $imagen, 250, 150, 200, 200, 0, 360, $negro);
imagearc( $imagen, 250, 150, 180, 180, 0, 360, $negro);
//imagefilledarc( $imagen, xc, yc, ancho, alto, gi, gf, $color1,IMG_ARC_PIE)
imagefilledarc( $imagen, 250, 150, 180, 180, 0, 90, $blanco,IMG_ARC_PIE);
imagefilledarc( $imagen, 250, 150, 180, 180, 90, 180, $blanco2,IMG_ARC_CHORD);
imagefilledarc( $imagen, 250, 150, 180, 180, 180, 270, $blanco3,IMG_ARC_NOFILL);
imagefilledarc( $imagen, 250, 150, 180, 180, 270, 360, $blanco4,IMG_ARC_EDGED);


imageline( $imagen, 0, 150, 500, 150, $negro );

// envía imagen tras la cabecera
 header("Content-type: image/png");
 imagepng($imagen);
 imagedestroy($imagen);
 
 
 
 
 
 
 
 
 
 
 
?>