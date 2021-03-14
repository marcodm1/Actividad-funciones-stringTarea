<?php  
    $numero = $_GET['num'] +1;
    $foto   = $_GET['foto'];

    header("Content-type: image/jpeg");
    $ruta = "./Nature/$foto";
    $image = imagecreatefromjpeg($foto);
    $color = imagecolorallocate($image, 255, 255, 255);
    switch ($_GET['cambio']){
        case "horizontal":  imageflip($image, IMG_FLIP_HORIZONTAL);
            break;
        case "vertical":    imageflip($image, IMG_FLIP_VERTICAL);
            break;
        case "ambos":       imageflip($image, IMG_FLIP_BOTH);
            break;
    }

    $fontSize = 3;
    $x = 10;
    $y = 10;
    imagestring($image, $fontSize, $x, $y, $numero, $color);
    imagejpeg($image);


 ?>


