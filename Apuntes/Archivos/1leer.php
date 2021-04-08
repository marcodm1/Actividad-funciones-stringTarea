<?php
    // abrir para leer
    $archivo  = "texto.txt";
    $archivo1 = fopen($archivo, 'r') or die("No disponible el archivo seleccionado!"); 
    if ($archivo1){
        leerComoArray();
        leerLinea();
        leerArchivoEntero();
    }else {
        echo "Error al abrir el archivo";
    }
    if (fclose($archivo1)){
        echo "<br><br>El archivo se ha cerrado correctamente <br><br>";
    }


    function leer_como_array() {
        // aqui guardamos el contenido del archivo como array
        $array = file($archivo);
        foreach ($array as $linea => $posicion) {
            echo $posicion;
        }
        echo "<br>";
        echo $array[2]; // muestro la tercera linea
    }
    function leerLinea() {
        echo fgets($archivo1, 1000); // leemos la primera linea del archivo1 hasta tamaño
    }
    function leerArchivo() {
        echo fread($archivo1, 1000);    // leemos de forma lineal el archivo1 hasta tamaño
    }
?>