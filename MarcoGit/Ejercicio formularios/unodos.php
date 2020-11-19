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
        $errores = false;
        $listaErrores = array();

        // aqui conprueba que se haya enviado el formulario con "algo"
        if (isset($_POST['nombre']) && isset($_POST['contrasenia']) && isset($_POST['check']) && isset($_POST['sexo']) && isset($_POST['asignatura'])){
            // valida tamaño del nombre y la contraseña
            if (strlen($_POST['nombre']) >= 5 && strlen($_POST['contrasenia']) >= 5){
                
                // si hay errores los agrega al array
            }else {
                $errores = true;
                $listaErrores["nombre"] = "error, usuario o contraseña demasiado cortos<br>";
            }
           
            // validar datos
            if (isset($_POST['check'])){
            }else {
                $errores = true;
                $listaErrores["check"] = "error, usuario no ha aceptado LOPD";
            }
            // validar datos
            if (in_array("DI",$_POST['asignatura'])){
            }else {
                $errores = true;
                $listaErrores["DI"] = "error, asignatura incorrecta.";
            }
            
            // si no hay errores, se imprimen los resultados
            if (!$errores){
                echo "Nombre: " . $_POST['nombre'];
                echo "<br>";
                echo "Contraseña: " . $_POST['contrasenia'];
                echo "<br>";
                echo "Check: " . $_POST['check'];
                echo "<br>"; 
                echo "Sexo: " . $_POST['sexo'];
                echo "<br>";
                echo "Asignatura DI <br>";
            }else{
                foreach ($listaErrores as &$valor) {
                    echo "$valor <br>";
                }
                mostrarFormulario();
            }

            
            // si no se envia algo del formulario pasamos aqui
        }else{
            mostrarFormulario();
            }

                // en la 67 al final faltaba algo para que muestre si ha habido un error que se guarde
            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                        <input type="text" name="nombre" id="txtNombre" ><br><br>

                    <label for="gg"><strong>Escriba su contraseña:</strong></label>
                        <input type="password" name="contrasenia" id="gg" ><br><br>

                    <label for="check"><strong>Aceptar politica de privacidad:</strong></label>
                        <input type="checkbox" name="check"><br><br>

                    <label for="sexo"><strong>Seleccione su sexo:</strong></label>
                    <label for="hombre">Hombre</label>
                        <input type="radio" name="sexo" value="hombre">
                    <label for="mujer">Mujer</label>
                            <input type="radio" name="sexo" value="mujer">

                    <label for="asignatura"><strong>Seleccione su asignatura:</strong></label>
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