
<?php // script img1.php
 $imagen= imagecreate(400, 40); // ancho x alto
// establece color de fondo
 $fondo= imagecolorallocate($imagen,100,255,255);
// envía imagen tras la cabecera
 header("Content-type: image/png");
 imagepng($imagen);
 imagedestroy($imagen);

?>

