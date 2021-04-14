<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio fechas">
	</head>
	<body>
        <?php 
            $ahora  = date("d-m-Y");                            
            $ahora2 = date("d/m/Y",strtotime("+1 day"));        // dentro de un dia
            $ahora3 = date("dxmxY",strtotime("+1 week"));       // dentro de una semana 
            $ahora4 = date("dçmçY",strtotime("next Thursday")); // proximo jueves 
            $ahora5 = date("dpmpY",strtotime("last Monday"));   // ultimo lunes
            $ahora6 = date("d,m,Y",strtotime("next Monday"));   // proximo lunes
            $ahora7 = date("d_m_Y",strtotime("+1 Month"));      // en un mes
            $ahora8 = date("d=m=Y",strtotime("next Year"));     // en un mes
            $ahora9 = date("d-m-Y, g:i");
            $nuevafecha = strtotime ('+1 hour'   , strtotime($ahora9));
            $nuevafecha = strtotime ('+13 minute', strtotime($ahora9));
            $nuevafecha = strtotime ('+30 second', strtotime($ahora9));
            $nuevafecha = date ('d-m-Y', $nuevafecha);

            echo $ahora  . " ahora<br>";  
            echo $ahora2 . " dentro de un dia<br>"; 
            echo $ahora3 . " dentro de una semana<br>"; 
            echo $ahora4 . " proximo jueves<br>";  
            echo $ahora5 . " ultimo lunes<br>";
            echo $ahora6 . " proximo lunes<br>";
            echo $ahora7 . " en un mes<br>";
            echo $ahora8 . " proximo año<br>";
            echo $ahora9 . " <br>";
            echo $nuevafecha . " <br>";
    
        ?>
    </body>
</html>