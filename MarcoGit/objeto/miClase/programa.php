<?php
    include "miClase.php";

    $maquina = new MaquinaCoser(500, true);
    $quad    = new Quad("HCE", true, "verde", 120);
    $coche   = new Coche("verde", 100);

    $coche  ->setColor("rojo");
    $maquina->setHilo(false);
    $quad   ->setRejilla(false);
    

    echo "La maquina de coser tiene hilo? " . ($maquina->getHilo ? "Si" : "No") . "<br>";
    echo "El quad tiene rejilla? "          . ($quad->getRejilla ? "Si" : "No") . "<br>";
    echo "De que color es el coche? "       . $coche->getColor . "<br>";
?>