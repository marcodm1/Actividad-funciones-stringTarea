<!DOCTYPE html>
<?php
    // primera vez que pasa
    if (isset($_POST['frase']) ){
        setcookie("frase", $_POST['frase'], time() +3000);       // frase para adivinar
        setcookie("vidas", 5, time() +3000);                     // cantidad de vidas
        $convertidaTotal = ocultar($_POST['frase']);             // creamos la frase $convertidaTotal
        setcookie("fraseOculta", $convertidaTotal, time() +3000);// creamos cokie de la frase
    }
              
?>

<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ahorcado">
	</head>
	<body>
        <?php // 3 datos, chat, fraseOriginal, fraseOculta
            if (isset($_COOKIE['frase']) ){
                $fraseOriginal = $_COOKIE['frase'];
                $fraseOculta   = $_COOKIE['fraseOculta'];

                if (isset($_POST['char']) ){ 
                    $fraseModificada = ocultarConCHAR($fraseOriginal);

                    setcookie("fraseOculta", $fraseModificada, time() +3600);
                    echo $fraseOriginal . "<br>";
                }else {
                    echo $_COOKIE['fraseOculta'] . "<br>";
                }
                formulario();
               // falta el contador
            }else {
                echo "no se ha pasado ninguna frase";
                ?>
                <a href="http://localhost/Actividad-funciones-stringTarea/MarcoGit/Ejercicio%20ahorcado/ahorcado.php">Pagina principal</a>
                <?php
            }

            function ocultar($frase){
                $builder = null;
                for ($i=0; $i<strlen($frase); $i++){
                    $posicion = $frase[$i];

                    if ($posicion == " "){
                        $builder = $builder . " ";
                    }else{
                        $builder = $builder . "_";
                    }
                }
                return $builder;
            }


            function ocultarConCHAR ($fraseOriginal){
                $fraseOriginal    = $_COOKIE['frase'];
                $fraseDescubierta = $_COOKIE['fraseOculta'];

                $letra = $_POST['char'];
                
                for ($i=0; $i<strlen($fraseOriginal); $i++){
                    $posicion = $fraseOriginal[$i];

                    if ($posicion != " "){
                    }else {
                        if ($posicion == $letra){
                            $fraseDescubierta[$i] = $letra;
                        }
                    }
                }
                return $fraseDescubierta;
            }


            // function adivinar($letra, $frase, $fraseOculta){

            //     for ($i=0; $i<strlen($frase); $i++){
            //         if ($letra == $frase[$i]){
            //             $fraseOculta[$i] = $letra;
            //         }
            //     }
            //     return $fraseOculta;
            // }

         

            //<input type="hidden" name="caracter" value=' . $aniadido = $aniadido + $_POST['char'] . '>

            function formulario(){
                ?>
                <form action="ahorcado2.php" method="post">
                    Introduzca una letra <input type="text" name="char" id="txt" ><br><br>
                    <input type="submit" value="enviar">
                </form>

                <?php
            }
            
                
                
            //     _______<br>
            //    ..|......|<br>
            //    ..|......0<br>
            //    ..|.....´|`<br>
            //    ..|.....´ `<br>
            //    _|___<br>



               

        ?>
        
        


    </body>
</html>