<?php
    parametros(1, 'dwes', "hola");
    parametros(1);

    function parametros($parametro0, $parametro1 = 'dwes') {
        echo '<pre>';
        print_r(func_get_args()); // mostrara solo los parametros que se le pasan el por defecto no
        echo '</pre>';
        echo $parametro1;
    }


?>