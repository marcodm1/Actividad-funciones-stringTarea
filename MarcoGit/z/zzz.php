<!DOCTYPE html>

<html lang="es">
    <head>
    <meta charset="UTF-8">
        <title>Marco Domínguez</title>
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Actividad funciones fecha">
        <link rel="stylesheet" href="mensajes.css">
        <title>xxx.html</title>
    </head>
    <body>
        <?php 
                $volver = "mensajes.php?nombre=".$_GET['nombre']."&contrasenia=".$_GET['contrasenia'];

                if (isset($_GET['comentario'])){
                    $nuevo = substr($_GET['comentario'], 0, 140);
                    echo "Cantidad de letras es: "      . $tamaño       = strlen($_GET['comentario']) . "<br>";
                    echo "Cantidad de palabras es: "    . $palabras     = str_word_count($nuevo)      . "<br>";
                    echo "La palabra mas repetida es: " . $palabraMas   = palabraMas($nuevo)          . "<br>";
                    echo "La letra mas repetida es: "   . $letraMas     = letraMas($nuevo)            . "<br>"; 
                    echo "La palabra menos repetida: "  . $palabraMenos = palabraMen($nuevo)          . "<br>";
                    echo "La letra menos repetida: "    . $letraMenos   = letraMen($nuevo)            . "<br>";
                }

                echo '<a href="' . $volver . '">Volver</a>';

                function letraMas ($texto){
                    $maximo      = 0;
                    $letraActual = null;
                    $frase       = strtoupper($texto); 
                    
                    for ($i=65; $i<90; $i++) {
                        $letra = chr($i);
                        $cont  = substr_count($frase,$letra);
                        if ($maximo < $cont){
                            $maximo = $cont;
                            $letraActual = $letra;
                        }
                    }
                    return $letraActual;
                }

                function letraMen ($texto){
                    $minimo      = 100;
                    $letraActual = "no hay letras";
                    $frase       = strtoupper($texto); 
                    
                    for ($i=65; $i<90; $i++) {
                        $letra = chr($i);
                        $cont  = substr_count($frase,$letra);
                        if ($minimo > $cont){
                            $minimo = $cont;
                            $letraActual = $letra;
                        }
                    }
                    return $letraActual;
                }
            
                function palabraMas ($frase){
                    $frase         = strtoupper($frase);
                    $tabla         = explode(" ", $frase);
                    $aux           = array();
                    $mayor         = 0;
                    $palabraActual = "No hay letras";

                    
                    foreach ($tabla as &$palabra) {
                        if (isset($aux[$palabra])){
                            $aux[$palabra] ++;
                        }else{
                            $aux[$palabra] = 0;
                        }
                    }

                    foreach ($aux as $clave => $valor){
                        if ($valor > $mayor){
                            $mayor = $valor;
                            $palabraActual = $clave;
                        }
                    }
                    return $palabraActual;
                }

                function palabraMen ($frase){
                    $frase         = strtoupper($frase);
                    $tabla         = explode(" ", $frase);
                    $aux           = array();
                    $menor         = 100;
                    $palabraActual = null;

                    
                    foreach ($tabla as &$palabra) {
                        if (isset($aux[$palabra])){
                            $aux[$palabra] ++;
                        }else{
                            $aux[$palabra] = 0;
                        }
                    }

                    foreach ($aux as $clave => $valor){
                        if ($valor < $menor){
                            $menor = $valor;
                            $palabraActual = $clave;
                        }
                    }
                    return $palabraActual;
                }

        ?>
    </body>
</html>