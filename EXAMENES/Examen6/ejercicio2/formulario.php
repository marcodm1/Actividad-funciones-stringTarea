<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio2 unodos">
	</head>
	<body>
        <?php 
            $arrayFotos = glob("./Nature/*.jpg"); // busca todos los jpg en Nature
            formularioEvento($arrayFotos);

            function formularioEvento($arrayFotos){
                echo "<h1> SELECCIONA UNA IMAGEN</h1>";
                echo "<table>";
                $cont = 0;
                    for ($i = 0; $i < ceil(count($arrayFotos)/2); $i++) {
                        echo "<tr>";

                            for ($j = 0; $j < 2; $j ++) {
                                if (isset($_POST['imagen']) && isset($_POST['cambio']) && $_GET['imagen'] == $cont){
                                    $rotar           = $_GET['cambio'];
                                    $cambio="&cambio=$rotar";
                                    echo "<img src=\"crearIMG.php?foto=$arrayFotos[$cont]&num=$cont$cambio\">";
                                }
                                
                                if ($cont == count($arrayFotos)) {
                                    break;
                                }
                                echo "<td>"; // ejercicio2/formulario.php?imagen=1&cambio=vertical
                                    echo "<img src=\"crearIMG.php?foto=$arrayFotos[$cont]&num=$cont\">";
                                echo "</td>";
                                $cont ++;  
                            }

                        echo "</tr>";
                    }
                echo "</table>";
                    ?>
                        <form action="formulario.php" method="get">
                            <label for="intIMG">Seleccione imagen:</label>
                            <input type="number" name="imagen" id="intIMG"><br><br>

                            <label for="cambio">Cambio:</label>
                            <label for="horizontal">Horizontal</label>
                                <input type="radio" name="cambio" value="horizontal">
                            <label for="vertical">Vertical</label>
                                <input type="radio" name="cambio" value="vertical">
                            <label for="ambos">ambos</label>
                                <input type="radio" name="cambio" value="ambos">
                            <label for="ninguno">ninguno</label>
                                <input type="radio" name="cambio" value="ninguno"><br><br><br>

                        <input type="submit" value="Realizar los cambios">
                        
                    <?php
                
            }

        ?>
    </body>
</html>