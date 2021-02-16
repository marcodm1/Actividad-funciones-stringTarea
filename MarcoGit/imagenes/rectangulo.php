<?php 
    $imagen= imagecreate(300,30);
    $fondo= imagecolorallocate($imagen,100,255,255);
    // envía imagen tras la cabecera
    header("Content-type: image/png");
    imagepng($imagen);
    imagedestroy($imagen);
?>