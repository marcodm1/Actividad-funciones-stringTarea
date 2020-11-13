<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="...">
	</head>
	<body>
        <form action="fechas.php" method="get">
            Fecha <input type="number" name="fecha" id="txt" ><br><br>
            <input type="submit" value="enviar"><br><br>
        </form>
        <?php 
            // Devuelve un booleano que indica si la fecha expresada es válida (el mes, día y año) deben darse en formato numérico).
            //El rango del año puede ir del 1 al 32767
            $ok_fecha = checkdate(2,29,2012) ? ' fecha correcta' : ' fecha incorrecta' ;
            echo $ok_fecha ;

//---------------------------------------------------------

                // date( formato [, numero ] )
            echo "Son las ", date('h : i : s') ;
            echo " hoy es ", date("j‐n‐Y") . '<br>';
            echo "Fue a las ", date('h : i : s', 456573426) ;
            echo "del ", date('j – n  ‐ Y', 456573426) ;

//---------------------------------------------------------



        // Igual que date() devuelve la fecha y hora, en el formato indicado.
        //  Es sensible a los datos de localización establecidos con setlocale
        //  Los comodines de formato se pueden consultar en :

        //strftime( formato [, numero ] )

        // setlocale(LC_ALL,'esp'); //Funciona en Windows
        // echo strftime('%A, %d de %B de %Y');

//---------------------------------------------------------

        
        //getdate([, numero ] )
// Devuelve un array asociativo con parámetros de la fecha actual (sí no se da argumentos)
// o de la fecha correspondiente al número dado
// Los índices de este array se pueden ver en el ejemplo. No sensible a setlocale

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
    
    
//---------------------------------------------------------

// Devuelve la fecha PHP ( nº de segundos transcurridos desde el 1‐1‐1970 ) correspondiente al
// instante actual
// Funciones de FECHA
// mktime(hora , minuto , segundo , mes , dia , año )
// Devuelve la fecha PHP correspondiente a los datos dados
// Si se omiten argumentos (sólo pueden omitirse por la derecha) tomará los de la fecha actual.
// Cuando el parámetro día es cero devuelve el último día del mes anterior, pero si pasamos
// cero como parámetro de mes nos dará un error

    time();

    echo time(); // instante actual
    echo mktime(0,0,0,7,7,2014); // instante 7‐jul‐2014 a las 00 :00: 00


    
    
    
    
    
    
    
    ?>
    </body>
</html>