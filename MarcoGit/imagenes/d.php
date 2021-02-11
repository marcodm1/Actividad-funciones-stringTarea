<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ejercicio de imagenes</title>

</head>
<body>
    Pagina de inicio

    <?php

    // esto muestra toda la cabecera 
    // $x=apache_request_headers();
    // foreach($x as $k=>$v)
    // echo "en $k viene $v <br>";

    // header ('Refresh: 5; url=d.php');
    ?>

<?php // script img1.php
    $imagen= imagecreate(300, 30); // ancho x alto
    // establece color de fondo
    $fondo= imagecolorallocate($imagen,100,255,255); // color rgb
    // envía imagen tras la cabecera
    header("Content-type: image/png"); // aqui dices que quieres crear la img
    imagepng($imagen); // la crea aqui ?
    imagedestroy($imagen);
?>


</body>
</html>






<!-- 
Redirigir al cliente a otra dirección
Para ello solo tenemos que utilizar la cabecera Location.
header ( 'Location: acceso_no_autorizado.php' );
 Mostrar un mensaje y redirigir al cliente a otra dirección
La cabecera Refresh permite establecer un plazo en segundos antes de redirigir al navegador a otra dirección.
header ('Refresh: 5; url=http://www.google.es');
echo 'Lo que busca no existe, le redirigiremos a Google en 5 segundos'
 
Generar contenidos diferentes a páginas HTML con PHP
Se puede generar con PHP imágenes, documentos PDF,.etc. en tiempo real, es decir, sin tener que leerlos
de ningún archivo. Para ello es necesario usar librerías especiales de PHP como GD, PDFlib,...
 header( "Content-type: image/png");
-->