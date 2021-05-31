<?php  
// ----------- crear img con un tamaño x y color de fondo
    $ancho      = 150;
    $alto       = 150;
    $imagen     = imagecreate($ancho, $alto);
    $colorFondo = imagecolorallocate($imagen, 255, 255, 255); // color de fondo de la img

//------------- texto en la img
    $tamañoRand    = mt_rand(10, 30);
    $posicionxRand = mt_rand(10, 50);
    $posicionyRand = mt_rand(40, 100); 
    $texto         = ""; // ascii 65-90 en mayusculas

    for ($i=0; $i<3; $i++) {
        $num   = mt_rand(65, 90);
        $letra = chr($num); // convertimos numero en letra
        $texto = $texto . $letra;
    }
    for ($i=0; $i<2; $i++) {
        $num   = mt_rand(0, 9);
        $texto = $texto . $num;
    }
    $a             = 10;
    $b             = 230;
    $anguloRand    = mt_rand(-60, 60);
    
//------------- color
    $colorRand1 = mt_rand($a, $b);
    $colorRand2 = mt_rand($a, $b);
    $colorRand3 = mt_rand($a, $b);
    $colorLetra = imagecolorallocate($imagen,$colorRand1, $colorRand2, $colorRand3);

//------------- pintar texto
    imagettftext($imagen, $tamañoRand, $anguloRand, $posicionxRand, $posicionyRand, $colorLetra, "c:/windows/fonts/arial.ttf", $texto);

    session_start();
    $_SESSION['texto'] = $texto;

    header("Content-type: image/png"); // estableces que en el body va a haber una imagen png
    imagepng($imagen);
    imagedestroy($imagen);





 ?>


