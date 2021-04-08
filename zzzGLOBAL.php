<?php
    $x = 10;
    $y = 20;
    algo();

    function algo() {
        $x = 1;
        $y = 2;
        echo "variables locales: x = $x, y = $y";
        global $x, $y;
        echo "variables globales: x = $x, y = $y";
    }

?>