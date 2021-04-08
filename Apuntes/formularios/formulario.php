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
       
            mostrarFormulario();
              
            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="txtNombre">Escriba su nombre:</label>
                            <input type="text" name="nombre" id="txtNombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                        <label for="gg">Escriba su contraseña:</label>
                            <input type="password" name="contrasenia" id="gg"><br><br>

                        <label for="gg3">Escriba su edad:</label>
                            <input type="number" name="edad" id="gg3"><br><br>

                        <label for="check">Aceptar politica de privacidad:</label>
                            <input type="checkbox" name="check" checked="checked"><br><br>

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