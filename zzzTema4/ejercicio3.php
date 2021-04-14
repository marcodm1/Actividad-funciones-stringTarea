<?php
    // se puede cambiar el formato del $_GET  que es "2021-04-28"
    if (isset($_GET['texto'])) {
        mostrarCadena($_GET['texto']);
        mostrarCadenaAlReves($_GET['texto']);
        mostrarCadenaMinusculas($_GET['texto']);
        mostrarCadenaSustituyendo($_GET['texto']);
        mostrarCaracterMasRepetido($_GET['texto']);
        mostrarCadenaHTML($_GET['texto']);
        contarLetras($_GET['texto']);
    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio3.php" method="get">
            
            <label for="textoo">Escriba un texto:</label>
                <input type="text" name="texto" id="textoo"><br><br>

            <input type="submit" value="enviar">
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
    function mostrarCadenaMinusculas($texto) {
        $mayus = strtoupper($texto);
        echo $mayus . "<br>";
    }
    function mostrarCadenaSustituyendo($texto) {
        $modificada;
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[$i] == "a" || $texto[$i] == "e" || $texto[$i] == "i" || $texto[$i] == "o" || $texto[$i] == "u") {
                $modificada[$i] = "a";
            }else {
                $modificada[$i] = $texto[$i];
            }
        }
        foreach ($modificada as $letra) {
            echo $letra;
        }
        echo "<br>";
    }
    function mostrarCaracterMasRepetido($texto) {
        
    }
    function mostrarCadenaHTML($texto) {
        
    }
    function contarLetras($texto) {
        $espacios = 0;
        $letra = 0;
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[$i] == " ") {
               $espacios ++;
            }else {
                $letra ++;
            }
        }
        $veces = strlen($texto);
        echo "La cadena tiene " . $letra . " letras" . " y " . $espacios . " espacios.";
    }


?>