<!DOCTYPE html>
<?php
    // primera vez que pasa
    if (isset($_POST['frase']) ){
        setcookie("frase", $_POST['frase'], time() +3000);       
        setcookie("intentos", 5, time() +3000);                  
        $convertidaTotal = ocultar($_POST['frase']);            
        setcookie("fraseOculta", $convertidaTotal, time() +3000);
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
        <?php 
            if (isset($_COOKIE['frase']) ){
                $fraseOriginal = $_COOKIE['frase'];
                $fraseOculta   = $_COOKIE['fraseOculta'];
                $encontrado    = false;
                
                if (isset($_POST['char']) ){ 
                    $fraseModificada = ocultarConCHAR();
                    if ($fraseModificada == $fraseOriginal){
                        echo "Has ganado!";
                        ?>
                                    <form action="ahorcado.php" method="post">
                                        <input type="submit" value="Volver a jugar">
                                    </form>
                                <?php
                    }else {
                        setcookie("fraseOculta", $fraseModificada, time() +3600);
                        echo $fraseModificada . "<br>";
    
                        if ($encontrado == false){
                            $cont = $_COOKIE['intentos'] -1;
                            setcookie("intentos", $cont, time() +3000);
                            if ($cont == 0){
                                echo "Has legado a 5 intentos, has perdido";
                                ?>
                                    <form action="ahorcado.php" method="post">
                                        <input type="submit" value="Volver a jugar">
                                    </form>
                                <?php
                            }else{
                                echo "Te quedan " . $cont . " vidas";
                                formulario();
                            }
                        }else {
                            formulario();
                        }
                    }
                }else {
                    echo $_COOKIE['fraseOculta'] . "<br>";
                    formulario();
                }
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


            function ocultarConCHAR (){
                $fraseOriginal    = $_COOKIE['frase'];
                $fraseDescubierta = $_COOKIE['fraseOculta'];
                $letra = $_POST['char'];
                global $encontrado;

                for ($i=0; $i<strlen($fraseOriginal); $i++){
                    $posicion = $fraseOriginal[$i];
                    if ($posicion == $letra){
                        $fraseDescubierta[$i] = $letra;
                        $encontrado = true;
                    }
                }
                return $fraseDescubierta;
            }


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