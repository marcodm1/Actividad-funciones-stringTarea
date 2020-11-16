<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio fechas">
	</head>
	<body>
        <form action="fechas.php" method="get">
            Fecha (día, mes, año): <input type="text" name="fecha" id="txt" ><br><br>
            <input type="submit" value="enviar"><br><br>
        </form>

        <?php 
            if (isset($_GET['fecha'])){
                $fechaAhora = date("d,m,Y");
                $fechaUsuario = $_GET['fecha'];
                plazo ($fechaAhora, $fechaUsuario);
            }

            function plazo ($fechaAhora, $fechaUsuario){
                if ($fechaAhora >= $fechaUsuario){
                    echo $fechaAhora . ": Esta fuera de fecha";
                }else {
                    echo $fechaUsuario . ": Esta en fecha";
                }
            }
     
            // $s = getdate(); // Obtiene datos de la fecha y hora actual
            // echo $s['seconds']; // los segundos
            // echo $s['minutes']; // los minutos
            // echo $s['hours']; // la hora
            // echo $s['mday']; // el día del mes
            // echo $s[wday]; // el nº del día de la semana
            // echo $s[mon]; // el nº del mes
            // echo $s[year]; // el año
            // echo $s[yday]; // nº del día en el año
            // echo $s[weekday]; // el día de la semana
            // echo $s[month]; // el nombre del mes
    
 
    
    
    
    
    ?>
    </body>
</html>