<?php
    $img = imagecreate(300, 100); 
    $r = $_GET['colorR'];
    $g = $_GET['colorG'];
    $b = $_GET['colorB'];
    imagecolorallocate($img, $r, $g, $b);
  
//------------- estableces que en el body va a haber una img png
    header("Content-type: image/png");
    imagepng($img);


 ?>
