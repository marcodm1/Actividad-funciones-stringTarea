<?php
    $array = [
        "Fregar"  => "Usar la fregona en el suelo", 
        "Barrer"  => "Usar la escoba e nel suelo", 
        "Cocinar" => "Preparar la comida", 
        "Ordenar" => "Colocar lo desordenado"
    ];
    $array = serialize($array); // preguntarle que es
    $array = urlencode($array);
    header("Location: recibe.php?tareas=" . $array);
?>