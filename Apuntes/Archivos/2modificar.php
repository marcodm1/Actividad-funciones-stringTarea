<?php
    $fichero  =  __DIR__ . DIRECTORY_SEPARATOR . "texto.txt";
    $archivo  = fopen($fichero, 'r');           // fopen devuelve el archivo
    $linea1   = fgets($archivo);                // fgets devuelve la primera linea
    $lineas   = file($fichero);                 // file devuelve un array, y cada posicion es una linea
    // $texto    = file_get_contents($fichero);    // Transmite un fichero completo a una cadena lineal
    $unido    = implode("------", $lineas);     // convierte array en string
    $separado = explode(" ", $unido);           // convierte string en array
    // feof($archivo);                          // Comprueba si el puntero a un archivo está al final del archivo

    echo "<br>" . $linea1 . "<br>";
    echo "<pre>"; print_r($lineas); echo "</pre>";
    echo "<br>" . $texto . "<br>";
    echo "<br>" . $unido . "<br>";
    echo "<pre>"; print_r($separado); echo "</pre>";



    fclose($archivo);
?>