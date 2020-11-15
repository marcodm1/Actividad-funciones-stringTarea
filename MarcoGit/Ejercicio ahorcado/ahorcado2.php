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
            
            if (isset($_POST['palabra'])){

                $palabra = $_POST['palabra'];

                $palabraOculta = convertir($palabra);
                echo $palabraOculta . "<br>";
                // formulario para introducir la letra
                if (isset($_POST['char'])){
                    $letra = $_POST['char'];
                    $palabraOcultaModificada = adivinar($letra, $palabra, $palabraOculta);
                    echo $palabraOcultaModificada;
                }
            }
            


            function convertir($palabra){
                $aux = null;

                for ($i=0; $i<strlen($palabra); $i++){
                    $posicion = $palabra[$i];

                    if ($posicion == " "){
                        $aux = $aux . " ";
                    }else{
                        $aux = $aux . "*";
                    }
                }
                return $aux;
            }


            function adivinar($letra, $palabra, $palabraOculta){

                for ($i=0; $i<strlen($palabra); $i++){
                    if ($letra == $palabra[$i]){
                        $palabraOculta[$i] = $letra;
                    }
                }
                return $palabraOculta;
            }




            echo'
                <form action="ahorcado2.php" method="post">
                    Introduzca una letra <input type="text" name="char" id="txt" ><br><br>
                    <input type="hidden" name="palabra" value=' . $_POST['palabra'] . '>
                    <input type="submit" value="enviar">
                </form>';

        ?>
        
        


    </body>
</html>