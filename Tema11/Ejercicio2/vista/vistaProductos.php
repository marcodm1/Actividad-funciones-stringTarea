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
        require_once("./controlador/controlador.php");

        // if (isset($errorUsuario)) {
        //     echo $errorUsuario;
        // }
        function mostrarResultados($resultado) {
            ?>
            <table style="border: 2px solid black; background-color: #9BBF9D;">
                <tr><td>Resultado de la busqueda</td></tr>
                <?php
                foreach ($resultado as $fila => $contenido) {
                    ?>
                    <tr  style="border: 1px solid black; background-color: #5EAC63;"><td>
                    <?php foreach ($contenido as $columna) {
                            echo $columna . ": ";
                          }
                    ?>
                    </td></tr>
                    <?php
                }
            ?>
            </table>
            <?php
        }

        function formularioAlta() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Alta de un usuario nuevo: </strong><br><br>
                <label for="alumno1">Escriba el login:</label>
                    <input type="text" name="login" id="alumno1" ><br><br>

                <label for="pass1">Escriba la clave:</label>
                    <input type="password" name="clave" id="pass1" ><br><br>

                <input type="submit" name="formulario" value="alta">
            </form>
            <?php   
        }
    ?>

</body>
</html>