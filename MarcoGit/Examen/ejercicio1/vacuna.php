<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="examen Ej:1">
	</head>
	<body>
        <?php
            $errores = false;
            $listaErrores = array();

            if (isset($_POST['nombreVacuna']) && isset($_POST['efectividad']) && 
                    isset($_POST['fechaEntrega']) && isset($_POST['imagen']) ){
                
        
                if (isset($_GET['fechaEntrega'])){
                    echo $fechaAhora = date("Y-m-d");
                     $fechaUsuario = $_GET['fechaEntrega'];
                     plazo ($fechaAhora, $fechaUsuario);
                }
    
                function plazo ($fechaAhora, $fechaUsuario){
                    if ($fechaAhora >= $fechaUsuario /* + la constante*/){
                        echo $fechaAhora . ": Esta fuera de fecha";
                    }else {
                        echo $fechaUsuario . ": Esta en fecha";
                    }
                }

                if (!$errores){
                    echo $_GET['nombreVacuna'];
                    echo $_GET['efectividad'];
                    echo $_GET['fechaEntrega'];
                    echo $_GET['imagen'];
                    // crear un fichero en el subdirectorio img
                }else{
                    foreach ($listaErrores as &$valor) {
                        echo $valor;
                    }
                    mostrarFormulario();
                }
                


                function plazo ($fechaAhora, $fechaE){
                    if ($fechaAhora >= $fechaE){
                        $errores = true;
                        $listaErrores['fechaEntrega'] = "Error: fecha de entrega tiene que ser superior a la actual";
                    }
                }

             
            }else{
                echo "Tienes que rellenar todos los campos.<br><br>";
                mostrarFormulario();
                }

            function mostrarFormulario(){
                ?>
                
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="nombreVacuna">Nombre de la vacuna:</label>
                    <input type="text" name="nombreVacuna" id="nombreVacuna" value="<?php if (isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                <label for="efectividad">Indique el % de efectividad de la vacuna:</label>
                    <input type="number" name="efectividad" id="efectividad" min="0" max="100" value="<?php if(isset($_POST['efectividad'])){echo $_POST['efectividad'];} ?>"><br><br>

                <label for="fechaEntrega">Seleccione una fecha de entrega:</label>
                    <input type="date" name="fechaEntrega" id="fechaEntrega" value="<?php if (isset($_POST['fechaEntrega'])){echo $_POST['fechaEntrega'];} ?>"><br><br><!-- hacer la constante   --> 
                    
                <!-- Seleccionable de archivos para seleccionar la img -->

                <input type="submit" value="enviar">

                <?php
            }
        
        ?>
        

    </body>
</html>