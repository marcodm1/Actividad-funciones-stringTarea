<?php
    $img = imagecreate(300, 100); 
    imagecolorallocate($img, 255, 0, 0);
  
//------------- estableces que en el body va a haber una img png
    header("Content-type: image/png");
    imagepng($img);


 ?>