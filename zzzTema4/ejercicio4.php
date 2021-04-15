- mostrar el número con un total de 2 cifras decimales.

<?php
    if (!empty($_GET['numero'])) {
        mostrarNumero($_GET['numero']);
        mostrarEnFormato($_GET['numero']);
        mostrarConDecimales($_GET['numero']);
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
        echo "<br>Has seleccionado el: " . $numero . "<br>";
    }
    function mostrarEnFormato($numero) {
        $binario = decbin($numero);
        echo $binario;
        echo "<br>";
        // ______________
        $octal = decoct($numero);
        echo $octal;
        echo "<br>";
        // ______________
        $hexadecimal = dechex($numero);
        echo $hexadecimal;
        echo "<br>";
    }
    function mostrarConDecimales($numero) {
        if (is_numeric($numero)) {
            $decimal = number_format($numero);
            echo $decimal;
            echo "<br>";
        }else {
            echo "No es numerico";
        }
    }
   

?>