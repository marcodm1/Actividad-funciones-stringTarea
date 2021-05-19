<?php
    $array = [
        "Fregar"  => "Usar la fregona en el suelo", 
        "Barrer"  => "Usar la escoba e nel suelo", 
        "Cocinar" => "Preparar la comida", 
        "Ordenar" => "Colocar lo desordenado"
    ];
    
    header("Location: recibe.php?tareas[Fregar]=Usar la fregona en el suelo&tareas[Barrer]=Usar la escoba e nel suelo");
?>