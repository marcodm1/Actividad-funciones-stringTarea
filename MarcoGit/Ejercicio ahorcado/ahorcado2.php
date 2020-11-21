<!DOCTYPE html>
<?php
    if (isset($_POST['frase']) ){
        setcookie("frase", $_POST['frase'], time() +3600);  // frase para adivinar
        setcookie("vidas", 5, time() +3600);                // cantidad de vidas
        $convertida = convertir($_POST['frase']);           // creamos la frase convertida
        setcookie("fraseOculta", $convertida, time() +3600);// creamos cokie de la frase
    }

    if (isset($_POST['char']) ){ 
        setcookie("char", $_POST['char'], time() +3600);
    } // char para adivinar

    
                   
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
                $frase = $_COOKIE['frase'];
                
                $fraseOculta = convertir($frase);
                echo $fraseOculta . "<br>";
            
                formulario();

                $fraseOculta = convertir2($frase);
                echo $fraseOculta . "<br>";
               

            }else echo "no se ha pasado ninguna frase";
       

            function convertir($frase){
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


            function convertir2 ($frase){
                $builder = null;
               
                if (isset($_POST['char'])){
                    $letra = $_POST['char'];
                }

                for ($i=0; $i<strlen($frase); $i++){
                    $posicion = $frase[$i];

                    if ($posicion == " "){
                        $builder = $builder . " ";
                    }else{
                        if ($posicion == $letra){
                            $builder = $builder . $letra;
                        }else{
                            $builder = $builder . "_";
                        }
                    }
                }
                return $builder;
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
                    <input type="hidden" name="frase" value="<?php $_POST['frase']?>">
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