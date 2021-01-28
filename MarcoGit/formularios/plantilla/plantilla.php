<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="hh">
    <link rel="stylesheet" href="plantilla.css">
</head>
<body>
    <?php 
    if (isset($_POST['nombre']) && isset($_POST['contrasenia']) && isset($_POST['check']) && isset($_POST['sexo']) && isset($_POST['asignatura'])){
        // programa


    }else{
        mostrarFormulario();
        }
            
        function mostrarFormulario( ){
            ?>
            <div class="principal">
                <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="txtNombre">Escriba su nombre:</label>
                        <input type="text" name="nombre" id="txtNombre" >

                    <label for="gg">Escriba su contraseña:</label>
                        <input type="password" name="contrasenia" id="gg">

                    <label for="check">Aceptar politica de privacidad:</label>
                        <input type="checkbox" name="check"><br><br>

                    <label for="sexo">Seleccione su sexo:</label>
                    <label for="hombre">Hombre</label>
                        <input  type="radio" name="sexo" value="hombre">
                    <label for="mujer">Mujer</label>
                            <input  type="radio" name="sexo" value="mujer">

                    <label for="asignatura">Seleccione su asignatura:</label>
                        <select name="asignatura[]" id="asignatura">
                            <option value="DWES">DWES</option>
                            <option value="DWEC">DWEC</option>
                            <option value="DI">DI</option>
                        </select><br>

                    <input type="submit" value="enviar">
                </form>
            </div>
            <?php
        }
    ?>
</body>
</html>