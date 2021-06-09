<?php

    if (!empty($_GET['formulario'])) {
        if (!empty($_GET['texto'])) {
            mostrarCadena($_GET['texto']);
            mostrarCadenaAlReves($_GET['texto']);
            mostrarCadenaMayusculas($_GET['texto']);
            mostrarCadenaSustituyendo($_GET['texto']);
            mostrarCaracterMasRepetido($_GET['texto']);
            contarLetras($_GET['texto']);
            ?><br><br><a href="ejercicio3.php">Atras</a><?php
        }
    }
    else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio3.php" method="get">
            
            <label for="textoo">Escriba un texto:</label>
                <input type="text" name="texto" id="textoo"><br><br>

            <input type="submit" name="formulario" value="enviar">
        </form>
        <?php
    }

    function mostrarCadena($texto) {
        echo $texto . "<br>";
    }
    function mostrarCadenaAlReves($texto) {
        $alReves = strrev($texto);
        echo $alReves . "<br>";
    }
    function mostrarCadenaMayusculas($texto) {
        $mayus = strtoupper($texto);
        echo $mayus . "<br>";
    }
    function mostrarCadenaSustituyendo($texto) {
        for ($i = 0; $i < strlen($texto); $i++) {
            $letra = $texto[$i];
            if ($letra == "a" || $letra == "e" || $letra == "i" || $letra == "o" || $letra == "u") {
                $modificada[$i] = "a";
            }else {
                $modificada[$i] = $letra;
            }
        }
        foreach ($modificada as $letra) {
            echo $letra;
        }
    }
    function mostrarCaracterMasRepetido($texto) {
        $repetido = count_chars($texto, 1);
        echo "<br>";
        foreach ($repetido as $letra => $valor) {
            echo "La letra [" . chr($letra) . "] se repite " . $valor . " veces. <br>";
        }
        
    }
    function contarLetras($texto) {
        $espacios = 0;
        $letra    = 0;
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[$i] == " ") {
               $espacios ++;
            }else {
                $letra ++;
            }
        }
        echo "<br>";
        $veces = strlen($texto);
        echo "La cadena tiene " . $letra . " letras" . " y " . $espacios . " espacios.";
    }


?>