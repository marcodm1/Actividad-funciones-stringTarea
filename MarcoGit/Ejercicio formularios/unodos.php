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
            // validar datos
            if (strlen($_POST['nombre']) >= 5 && strlen($_POST['contrasenia']) >= 5){
                
            }else {
                $errores = true;
                $listaErrores[] = "error, usuario o contraseña demasiado cortos<br>";
            }
           
            // validar datos
            if (isset($_POST['check'])){
            }else {
                $errores = true;
                $listaErrores[] = "error, usuario no ha aceptado LOPD";
            }

            
          
            // validar datos
            if (in_array("DI",$_POST['asignatura'])){
                echo "Asignatura DI ";
            }else {
                $errores = true;
                $listaErrores[] = "error, asignatura incorrecta.";
            }

            if (!$errores){
                echo "Nombre: " . $_POST['nombre'];
                echo "<br>";
                echo "Contraseña: " . $_POST['contrasenia'];
                echo "<br>";
                echo "Check: " . $_POST['check'];
                echo "<br>"; 
                echo "Sexo: " . $_POST['sexo'];
                echo "<br>";
            }else{
                echo "alguna de las validaciones es incorrecta";
                mostrarFormulario();
            }

        
            print_r($listaErrores);
            // si no se envia algo del formulario pasamos aqui
        }else{
            mostrarFormulario();
            }

            function mostrarFormulario(){
                echo '
                    <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
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

                    <label for="asignatura"><strong>Seleccione su primera asignatura:</strong></label>
                        <select name="asignatura[]" id="asignatura">
                            <option value="DWES">DWES</option>
                            <option value="DWEC">DWEC</option>
                            <option value="DI">DI</option>
                        </select><br>

                    <input type="submit" value="enviar">
                ';
            }
        ?>
        


      
    </body>
</html>