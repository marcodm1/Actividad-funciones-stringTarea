<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
    <?php 
        $alumno = array (
            "nombre" 	 => "pepe",
            "edad" 		 => 21,
            "talla" 	 => 180,
            "domicilio"  => "calle pez",
            "idiomas" 	 => array("ingles", "frances", "español"),
            "pendientes" => false,
            1 => "kk",
            7,
            5,
        );
        
        $alumno["saludo"] = "hola";
        $alumno[1] = "gg";

        foreach ($alumno as $clave => $valor){
            echo "$clave => ";
            if(is_array($valor) == true) { // is_array verifica si es array
                foreach ($valor as $idioma) {
                    echo "$idioma ";
                }
            }else{
                echo " $valor";
            }
            echo "<br>";
        }
        echo $alumno[1] . "<br>";
        echo "---------------------<br>";

        $alumno2 = array(
            "pepe",
            21,
            180,
            "calle pez",
        );

       $alumno2[]="loqeusea";
        print_r ($alumno2);
        echo "<br>";
        
        foreach ($alumno2 as &$valor) {
            echo "$valor <br>";
        }

        echo $alumno2[3];

    ?>
    </body>
</html>
