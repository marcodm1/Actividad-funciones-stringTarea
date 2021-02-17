<?php // script img1.php
 $imagen= imagecreate(300, 30); // ancho x alto
// establece color de fondo
 $fondo= imagecolorallocate($imagen,100,255,255);
// envía imagen tras la cabecera
 header("Content-type: image/png");
 imagepng($imagen);
 imagedestroy($imagen);
?>