<?php
    if (defined("DADO_GANADOR")) {
        echo "Ya existe esta variable";
    }else {
        define("DADO_GANADOR", 5); 
    }
?>
