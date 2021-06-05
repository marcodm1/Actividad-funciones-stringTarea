<?php 
//------------- crear img con un tamaño x y color de fondo
    $img = imagecreate(150, 150); 
    $fr  = mt_rand(60, 155);
    $fg  = mt_rand(60, 155);
    $fb  = mt_rand(60, 155);
    imagecolorallocate($img, $fr, $fg, $fb); // color de fondo de la img

//------------- texto en la img
    $tamaño = mt_rand(10, 30);  
    $possX  = mt_rand(10, 50);   
    $possY  = mt_rand(40, 100);  
    $texto  = texto();
    
//------------- color
    $anguloR    = mt_rand(-60, 60);
    $colorR1    = mt_rand(10, 230);
    $colorR2    = mt_rand(10, 230);
    $colorR3    = mt_rand(10, 230);
    $colorLetra = imagecolorallocate($img,$colorR1, $colorR2, $colorR3);

//------------- pintar texto
    imagettftext($img, $tamaño, $anguloR, $possX, $possY, $colorLetra, "c:/windows/fonts/arial.ttf", $texto);

//------------- guardamos el texto
    session_start();
    $_SESSION['texto'] = $texto;

//------------- estableces que en el body va a haber una img png
    header("Content-type: image/png");

//-------------  cargar la img
    imagepng($img);


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


