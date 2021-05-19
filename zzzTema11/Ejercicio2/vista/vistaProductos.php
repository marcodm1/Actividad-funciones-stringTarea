<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
	</head>
	<body>
    <?php
        /*
        // Realizar otro MVC, para las altas de usuarios, utilizando la tabla de usuarios(login, clave) del tema anterior.
        // En la página principal, se mostrarán los datos de los usuarios dados de alta, y se incluirá un formulario para 
        // de alta nuevos usuarios.

        // Sugerencias: 
        // - Añadir controlador/controlador_alta: para que reciba los datos del formulario, cree un objeto Usuarios_modelo, 
        //   y ejecute el método alta_usuarios(). Después incluir la vista de vista/Usuarios_alta.php, para mostrar el 
        //   resultado del alta: si ha tenido éxito o no.
        // - Tener en cuenta que si el usuario ya está dado de alta en la base de datos, deberá informar al usuario.
        // - Todo lo relacionado con el acceso a base de datos deberá estar en el modelo, 
        // - Todo lo relacionado con HTML en la vista.
        // - El controlador recibe datos de la vista o del modelo y hace de intermediario y ejecuta las operaciones decontrol.
        */
        if (!empty($_GET['formulario'])) {
            $errores = array();
            if (!empty($_GET['formulario'])) {

            }
            if (!empty($_GET['formulario'])) {

            }
            require_once("modelo/conectaBD.php");
            require_once("controlador/controlador.php");
            require_once("vista/vistaProductos.php");


        }else {
            formulario();
        } 

        $conexion = ConectaBD::singleton();
        $resultado = $conexion->readP("todos");
        echo "<pre>";
        print_r($resultado);
        echo "</pre>";



        function formularioAlta() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Modificación de la base de datos: </strong><br><br>
                <label for="alumno1">Escriba el nombre del alumno:</label>
                    <input type="text" name="alumno" id="alumno1" ><br><br>

                <label for="pass1">Escriba la contraseña:</label>
                    <input type="password" name="passU" id="pass1" ><br><br>

                <input type="submit" name="formMod" value="alta">
                <input type="submit" name="formMod" value="modificacion">
            </form>
            <?php   
        }

        function formularioLogin() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <strong>Participante 1: </strong><br>
                <label for="txtNombre1">Escriba su login:</label>
                    <input type="text" name="login" id="txtNombre1" ><br><br>

                <label for="pass1">Escriba su clave:</label>
                    <input type="password" name="pass" id="pass1"><br><br>

                <input type="submit" name="formularioLogin" value="enviar">
            </form>
            <?php   
        }
    ?>

</body>
</html>