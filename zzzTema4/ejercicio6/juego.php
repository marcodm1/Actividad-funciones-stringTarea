<?php
    require_once("constantes.php");
    require_once("funciones.php");
    echo "La constante es 5:<br>";
    do {
        $rand = rand(1, 6);
        echo "<br>Numero: " . $rand;
        if (validaDado($rand) ) {
            echo " Has ganado!!";
        } else {
            echo " pierdes";
        }
    }while (!validaDado($rand));
    echo "<br>FIN.";


?>