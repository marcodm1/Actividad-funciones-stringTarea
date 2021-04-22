<?php

            // primero abrimos un archivo
    $fichero = fopen("texto.txt", "r");

    while ($userinfo = fscanf($fichero, "%[a-zA-Z0-9 ] | \n")) { // aqui pone lo que va a leer de un fichero
        echo "<pre>";
        var_dump($userinfo);
        echo "</pre>";
    }
    


?>