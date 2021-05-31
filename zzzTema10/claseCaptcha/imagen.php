<?php  

    elegirColor($_POST['color1']);
    

    function elegirColor($color) {
        switch($color) {
            case "rojo":
                $imagen = imagecreate(300, 100); 
                $r      = 255;
                $g      = 100;
                $b      = 100;
                imagecolorallocate($imagen, $r, $g, $b);
                return $imagen;
            case "verde":
                $imagen = imagecreate(300, 100); 
                $r      = 100;
                $g      = 255;
                $b      = 100;
                imagecolorallocate($imagen, $r, $g, $b); 
                return $imagen;
            case "azul":
                $imagen = imagecreate(300, 100); 
                $r      = 100;
                $g      = 100;
                $b      = 255;
                imagecolorallocate($imagen, $r, $g, $b); 
                return $imagen;
        }
    }




//------------- estableces que en el body va a haber una imagen png
    header("Content-type: image/png");

    imagepng($imagen);
 ?>
