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
        $errores      = false;
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
                    echo $valor;
                }
                mostrarFormulario();
            }

            
            // si no se envia algo del formulario pasamos aqui
        }else{
            mostrarFormulario();
            }

                
            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="txtNombre">Escriba su nombre:</label>
                            <input type="text" name="nombre" id="txtNombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                        <label for="gg">Escriba su contraseña:</label>
                            <input type="password" name="contrasenia" id="gg"><br><br>

                        <label for="check">Aceptar politica de privacidad:</label>
                            <input type="checkbox" name="check"><br><br>

                        <label for="sexo">Seleccione su sexo:</label>

                        <label for="hombre">Hombre</label>
                            <input type="radio" name="sexo" value="hombre">
                        <label for="mujer">Mujer</label>
                            <input type="radio" name="sexo" value="mujer">

                        <label for="asignatura">Seleccione su asignatura:</label>
                            <select name="asignatura[]" id="asignatura">
                                <option value="DWES">DWES</option>
                                <option value="DWEC">DWEC</option>
                                <option value="DI">DI</option>
                            </select><br>

                        <input type="submit" value="enviar">
                    </form> 
                <?php
            }
        ?>
        
    </body>
</html>