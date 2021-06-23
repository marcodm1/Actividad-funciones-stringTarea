- mostrar el número con un total de 2 cifras decimales.

<?php
    if (!empty($_GET['numero'])) {
        mostrarNumero($_GET['numero']);
        mostrarEnBiOcHe($_GET['numero']);
        mostrarConDecimales($_GET['numero']);
        ?><br><br><a href="ejercicio4.php">Atras</a><?php
    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio4.php" method="get">
            
            <label for="numeroo">Escriba un numero:</label>
                <input type="text" name="numero" id="numeroo"><br><br>

            <input type="submit" value="enviar">
        </form>
        <?php
    }
    function mostrarNumero($numero) {
        echo "<br>Has escrito: " . $numero . "<br>";
    }
    function mostrarEnBiOcHe($numero) {
        if (is_numeric($numero)) {
            if ($numero >= 0) {
                $binario = decbin($numero);
                echo "En binario es: " . $binario;
                echo "<br>";
        
                $octal = decoct($numero);
                echo "En octal es: " . $octal;
                echo "<br>";
        
                $hexadecimal = dechex($numero);
                echo "En hexadecimal es: " . $hexadecimal;
                echo "<br>";
            }else {
                echo "El numero seleccionado es negativo";
            }
        }else {
            echo "No has escrito un numero.";
        }
    }
    function mostrarConDecimales($numero) {
        if ($numero >= 0) {
            if (is_numeric($numero)) {
                $decimal = number_format($numero, 3);
                echo "Si tiene decimales: " . $decimal;
                echo "<br>";
            }else {
                echo "<br>No es un numero.";
            }
        }
    }
   
?>