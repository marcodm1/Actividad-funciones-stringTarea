<?php
    include "miClase.php";

    $maquina = new MaquinaCoser(500, true);
    $quad = new Quad("HCE", true);
    $coche = new Coche("verde", 100);

    $maquina->hilo = false;
    $quad->rejilla = false;
    $coche->color = "azul";
    
    // El programa es:
    // 1 interfaz en un archivo
    // 2 clases que implementan la interfaz y una 3ª clase que hereda de una de las dos
    // clases en otro archivo
    // y por ultimo, un tercer archivo con el programa. 
    echo "La maquina de coser tiene hilo? " . ($maquina->hilo ? "Si" : "No") . "<br>";
    echo "El quad tiene rejilla? " . ($quad->rejilla ? "Si" : "No") . "<br>";
    echo "De que color es el coche? " . $coche->color . "<br>";
?>