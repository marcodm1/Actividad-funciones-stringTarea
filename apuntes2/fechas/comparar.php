
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



<?php
    $mañana        = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
    $mes_anterior  = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
    $año_siguiente = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
?>

<?php
    // Se asume que hoy es March 10th, 2001, 5:16:18 pm, y que estamos en la
    // zona horaria Mountain Standard Time (MST)

    $hoy = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
    $hoy = date("m.d.y");                         // 03.10.01
    $hoy = date("j, n, Y");                       // 10, 3, 2001
    $hoy = date("Ymd");                           // 20010310
    $hoy = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
    $hoy = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
    $hoy = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
    $hoy = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
    $hoy = date("H:i:s");                         // 17:16:18
    $hoy = date("Y-m-d H:i:s");                   // 2001-03-10 17:16:18 (el formato DATETIME de MySQL)
?>

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
                <input type="date" name="fecha" value="<?php echo  ?>"><br><br>

            <input type="submit" name="formulario" value="enviar">
        </form>
        <?php
    }
?>