<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ahorcado">
	</head>
	<body>

        <?php 
             
            if (isset($_POST['frase'])){
                $frase = $_POST['frase'];

                $fraseOculta = convertir($frase);
                echo $fraseOculta . "<br>";
            
               
                if (isset($_POST['char'])){
                    
                    $letra = $_POST['char'];
                    $fraseOcultaModificada = adivinar($letra, $frase, $fraseOculta);
                    echo $fraseOcultaModificada;
                }
            }
       


            function convertir($frase){
                $aux = null;
                //$letraUsuario = $_POST['char'];
                // $caracteres = array();

                for ($i=0; $i<strlen($frase); $i++){
                    $posicion = $frase[$i];

                    if ($posicion == " "){
                        $aux = $aux . " ";
                    }

                    if($posicion != " "){
                        $aux = $aux . "*";
                    }

                    // if($posicion == $letraUsuario){
                    //     $aux = $aux . $letraUsuario;
                    // }

                    // if($posicion != $letraUsuario && $posicion != " "){
                    //     $aux = $aux . "*";
                    // }
                    
                    
                }
                return $aux;
            }


            function adivinar($letra, $frase, $fraseOculta){

                for ($i=0; $i<strlen($frase); $i++){
                    if ($letra == $frase[$i]){
                        $fraseOculta[$i] = $letra;
                    }
                }
                return $fraseOculta;
            }

         

            //<input type="hidden" name="caracter" value=' . $aniadido = $aniadido + $_POST['char'] . '>

            echo'
                <form action="ahorcado2.php" method="post">
                    Introduzca una letra <input type="text" name="char" id="txt" ><br><br>
                    <input type="hidden" name="frase" value="' . $_POST['frase'] . '">
                    <input type="submit" value="enviar">
                </form>
                
                
                
                _______<br>
               ..|......|<br>
               ..|......0<br>
               ..|.....´|`<br>
               ..|.....´ `<br>
               _|___<br>



                ';

        ?>
        
        


    </body>
</html>