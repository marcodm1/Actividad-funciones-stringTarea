<?php
    // abrir para leer
    $archivo  = "texto.txt";
    if ($fopen = fopen($archivo, 'r')) {
        leerComoArray($fopen, $archivo);
        // leerLineaLinea($fopen, $archivo);
        // leerArchivoEntero($fopen, $archivo);
        fclose($fopen);
    }else {
        echo "Error al abrir el archivo";
    }
    
    function leerComoArray($fopen, $archivo) {
        // aqui guardamos el contenido del archivo como array
        $tamaño = filesize($archivo);
        $array = explode("|", $fopen); //Transfiere un fichero completo a un array
        foreach ($array as $linea) {
            echo $linea . "<br>";
        }
        echo "<br>";
        // echo $array[2]; // muestro la tercera linea
    }
    function leerLineaLinea($fopen, $archivo) {
        $array = file($archivo); //Transfiere un fichero completo a un array
        foreach ($array as $linea) {
            echo $linea . "<br>";
        }
        echo "<br>";
        echo $array[2]; // muestro la tercera linea
    }
    function leerArchivoEntero($fopen, $archivo) {
        echo fread($fopen, filesize($archivo));    // leemos de forma lineal el archivo entero
    }
?>