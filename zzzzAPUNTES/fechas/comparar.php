
<?php
    // se puede cambiar el formato del $_GET  que es "2021-04-28"
    if (!empty($_GET['formulario'])) {
        if (!empty($_GET['fecha'])) {
            $ahora   = time();
            $elegida = strtotime(date($_GET['fecha']));
           
            if ($elegida > $ahora) {
                echo "Tu fecha elegida aun no ha pasado";
            }else if ($elegida < $ahora) {
                echo "Tu fecha elegida ya ha pasado";
            }else if ($elegida == $ahora) {
                echo "Son iguales";
            }
        }
    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio2.php" method="get">
            
            <label for="fecha">Seleccione una fecha:</label>
                <input type="date" name="fecha" value="2021-04-11"><br><br>

            <input type="submit" name="formulario" value="enviar">
        </form>
        <?php
    }
?>