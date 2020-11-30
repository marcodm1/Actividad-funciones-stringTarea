<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio fechas">
	</head>
	<body>
        <!-- <form action="fechas.php" method="get">
            Fecha (día, mes, año): <input type="date" name="fecha" id="txt" ><br><br>
            <input type="submit" value="enviar"><br><br>
        </form> -->

        <?php 
            // if (isset($_GET['fecha'])){
            //     $fechaAhora = date("Y-m-d");
            //     echo $fechaAhora . " Fecha actual<br>";
            //     $fechaUsuario = $_GET['fecha'];
            //     echo $fechaUsuario . " Fecha elegida por el usuario<br>";
            //     if ($fechaAhora >= $fechaUsuario){
            //         echo $fechaAhora . ": Fecha anterior a la actual";
            //     }else {
            //         echo $fechaUsuario . ": Fecha posterior a la actual";
            //     }
            // }
            define('CONSTANTE', 13);
            $fecha_actual = date("d-m-Y");
            echo "La fecha actual es... " . $fecha_actual . "<br>";
            
            $suma =  date("d-m-Y",strtotime($fecha_actual .  CONSTANTE . " day")); 
            echo "Si le sumamos 13 dias... " . $suma;
     
            $suma2 =  date("d-m-Y" . "1 day");
            echo $suma2;

            echo "<br><br>_______________________________<br><br>";

            $fechaActual = date("d-m-Y");

            echo "Fecha actual = " . $fecha_actual;
    
 
    
    
    
    
    ?>
    </body>
</html>