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
       
         
        // para comparar 2 cadenas
        strcmp($a, $b) === 0;

        // en concat con null y false, se convierten en cadena vacia
        $a = 12 + 10;           //nos devuelve byte
        $a = 12 + 12312313131;  //nos devuelve float
        $a = 12 + "1hola";      //nos devuelve 13
        $a = 12 + (5>3);        //nos devuelve 13
        $a = 12 + (5<3);        //nos devuelve 12
        $a = 5 . 2.3 . (5>3);   //nos devuelve "52.31" cadena
        $a;                     //nos devuelve 0 porque nada = false y false = 0




        $booleano   = FALSE; 
        $entero     = 123; 
        $real       = 123.45; 
        $LaNada;
        $cadena     = "Saludines<br>"; 
        $dias = array( "Lunes", "Martes", "Jueves");
        echo var_dump($booleano). "<br>" , var_dump($real) . "<br>";
        echo var_dump($dias[0]) . "<br>" , var_dump( $cadena + $entero ) . "<br>" ;
        echo var_dump($LaNada)  . "<br>" , var_dump( TRUE and (5<3) ) . "<br>" ;
        echo var_dump($dias)    . "<br>" ;
        echo gettype($booleano);// muestra boolean
        echo gettype($real );   // muestra double
        echo gettype($dias );   // muestra array
        if (gettype($LaNada) == "NULL") {
            echo "la variable $cadena es de tipo : "  . gettype($cadena);
            echo "y $cadena + $real es de tipo : "    . gettype($cadena + $real);
            $OtraVar = gettype($cadena + $real);
            echo "la variable $OtraVar es de tipo : " . gettype($OtraVar);
        }

      
        const MONEDA = "EURO";
        // isset trabaja con variables, ve si hay algo definido 
        // defined trabaja con constantes, ve si hay algo definido 
        if (!defined(MONEDA) ) {
            echo(MONEDA) . "<br>";
            echo gettype(MONEDA); // muestra el tipo de variable
        }else{
            echo "d";
        }

        // variables estaticas: como local pero se guardan en la funcion
        function test() {
            static $count = 0;
            $count ++;
            echo $count . "<br>";
            
        }
        test(); // muestra1 
        test(); // muestra2
         

        // un switch que le dan algo por parametro y ese es su valor
        switch (func_num_args()) { 
            case 0: $mensaje = "Buenos dias";
                    $persona = "pepe";
                    break;
            case 1: $persona = func_get_arg(0);
                    $mensaje = "Buenos dias";
                    break;
            case 2: $persona = func_get_arg(0);
                    $mensaje = func_get_arg(1);
                    break;
    }
            echo "$mensaje $persona <br>";




 // ponemos $mensaje por defecto, y siempre al final de la lista de parametros.
 function saludo ($persona, $mensaje = "Buenos dias") { 
    echo "$mensaje $persona <br>";
}
// como saludo(); tiene $mensaje esta por defecto, ponemos solo "pepe" para $persona
saludo("pepe"); 
saludo("ana", "Buenas tardes");



//apuntes 
bool : empty(mixed)

$_GET['nombre']          ;

//le pasa a _GET y si esta vacio, bool devuelve true
<input type="texto" name ="nombre">
<input type="checkbox" name="correo" value="time">



is_boool();
is_int();
is_float();
is_string();
is_array();
is_double();
is_objecto();
is_infinite();






	?>
	</body>
</html>