<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="solo prueba">
	</head>
	<body>
        <?php 
            $errores = false;
            $listaErrores = array();

            if (isset($_POST['nombre']) && isset($_POST['contrasenia']) && isset($_POST['check']) && isset($_POST['sexo']) && isset($_POST['asignatura'])){
                
                // validamos tamaño del nombre y contraseña
                if (strlen($_POST['nombre']) >= 5 && strlen($_POST['contrasenia']) >= 5){
                }else {
                    $errores = true;
                    $listaErrores[] = "Error, usuario o contraseña demasiado cortos.<br>";
                }
            
                // validamos si check esta seleccionado
                if (isset($_POST['check'])){
                }else {
                    $errores = true;
                    $listaErrores[] = "Error, usuario no ha aceptado LOPD.";
                }

                // si no hay errores, muestro los datos
                if (!$errores){
                    echo "Nombre: " . $_POST['nombre'];
                    echo "<br>";
                    echo "Contraseña: " . $_POST['contrasenia'];
                    echo "<br>";
                    echo "Check: " . $_POST['check'];
                    echo "<br>"; 
                    echo "Sexo: " . $_POST['sexo'];
                    echo "<br>";
                }else{ // s hay errores, muestro cuales y el formulario
                    echo "Alguna de las validaciones es incorrecta, vuelva a rellenar y reenvielo.<br>";
                    echo "Error/es en: <br>";
                    foreach ($listaErrores as &$valor) {
                        echo "$valor <br>";
                    }
                    //muestro formulario
                }
                   
                // compruebo si se ha seleccionado la asignatura correcta
                if (in_array("DI",$_POST['asignatura'])){
                    echo "Asignatura DI <br>";
                }else {
                    $errores = true;
                    $listaErrores[] = "Error, asignatura incorrecta.<br>";
                }
            
            // si no se envia algo del formulario pasamos aqui
            }else {
                ?>
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                        <input type="text" name="nombre" id="txtNombre" value="<?php if (isset($_POST['nombre'])) echo $_POST['nombre'];?>"><br><br> 


                    <label for="gg"><strong>Escriba su contraseña:</strong></label>
                        <input type="password" name="contrasenia" id="gg" ><br><br>

                    <label for="check"><strong>Aceptar politica de privacidad:</strong></label>
                        <input type="checkbox" name="check"><br><br>

                    <label for="sexo"><strong>Seleccione su sexo:</strong></label>
                    <label for="hombre">Hombre</label>
                        <input type="radio" name="sexo" value="hombre">
                    <label for="mujer">Mujer</label>
                            <input type="radio" name="sexo" value="mujer">

                    <label for="asignatura"><strong>Seleccione su primera asignatura:</strong></label>
                        <select name="asignatura[]" id="asignatura">
                            <option value="DWES">DWES</option>
                            <option value="DWEC">DWEC</option>
                            <option value="DI">DI</option>
                        </select><br>

                    <input type="submit" value="enviar">

    	        <?php
            }
            

        ?>
        
    </body>
</html>