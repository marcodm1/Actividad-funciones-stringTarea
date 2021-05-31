<?php // podria crear un monton de rayas para hacerlo mejor 
//------------- crear img con un tamaño x y color de fondo
    $ancho      = 150;
    $alto       = 150;
    $imagen     = imagecreate($ancho, $alto); // esto creo que es la zona donde va aesta la img
    $fr         = mt_rand(60, 155);
    $fg         = mt_rand(60, 155);
    $fb         = mt_rand(60, 155);
    imagecolorallocate($imagen, $fr, $fg, $fb); // color de fondo de la img

//------------- texto en la img
    $tamañoRand    = mt_rand(10, 30);   // tamaño texto
    $posicionxRand = mt_rand(10, 50);   // possX
    $posicionyRand = mt_rand(40, 100);  // possY
    $texto = texto();
    
//------------- color
    $entreA     = 10;
    $entreB     = 230;
    $anguloR    = mt_rand(-60, 60);
    $colorR1    = mt_rand($entreA, $entreB);
    $colorR2    = mt_rand($entreA, $entreB);
    $colorR3    = mt_rand($entreA, $entreB);
    $colorLetra = imagecolorallocate($imagen,$colorR1, $colorR2, $colorR3);

//------------- pintar texto
    imagettftext($imagen, $tamañoRand, $anguloR, $posicionxRand, $posicionyRand, $colorLetra, "c:/windows/fonts/arial.ttf", $texto);

//------------- guardamos el texto
    session_start();
    $_SESSION['texto'] = $texto;

//------------- estableces que en el body va a haber una imagen png
    header("Content-type: image/png");

//-------------  cargar la img
    imagepng($imagen);


    function texto() {
        $texto = "";
        for ($i = 0; $i < 3; $i++) {
            $num   = mt_rand(65, 90);
            $letra = chr($num); // convertimos numero en letra
            $texto = $texto . $letra;
        }
        for ($i = 0; $i < 2; $i++) {
            $num   = mt_rand(0, 9);
            $texto = $texto . $num;
        }
        return $texto;
    }


 ?>


