<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
	</head>
	<body>
    <style>
        body {
            background-color: #c3c3c3;
        }
    </style>

    <?php
        require_once("./controlador/controlador.php");

        function formOption() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Que quiere hacer en la base de datos </strong><br><br>
                <input type="submit" name="formOption" value="añadir">
                <input type="submit" name="formOption" value="modificar">
                <input type="submit" name="formOption" value="eliminar"><br><br>
            </form>
            <?php   
        }

        function formCreate() {
            ?>
            <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Alta de un usuario nuevo: </strong><br><br>
                <label for="alumnoCr">Escriba el login:</label>
                    <input type="text" name="loginCr" id="alumnoCr" ><br><br>

                <label for="passCr">Escriba la clave:</label>
                    <input type="password" name="claveCr" id="passCr" ><br><br>

                <input type="submit" name="formCreate" value="create">
            </form>
            <?php   
        }

        function formRead($resultado) {
            ?>
            <table  style="border: 2px solid black; background-color: #9BBF9D; ">
                <tr><td colspan="2" align="center">Usuarios:</td></tr>
                <?php
                foreach ($resultado as $fila => $contenido) {
                    ?>
                    <tr  style="border: 1px solid black; background-color: #5EAC63;">
                    <?php foreach ($contenido as $columna) {
                            ?> <td> <?php echo $columna; ?> </td>
                            <?php
                          }
                    ?>
                    </td></tr>
                    <?php
                }
            ?>
            </table>
            <?php
        }

        function formUpdate() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Modificación de un usuario: </strong><br><br>
                <label for="usuarioold">Escriba el login del usuario a modificar:</label>
                    <input type="text" name="loginUpO" id="usuarioold" ><br><br>

                <label for="usuarionew">Escriba el nuego login:</label>
                    <input type="text" name="loginUpN" id="usuarionew" ><br><br>

                <label for="usuarionew2">Escriba la nueva clave:</label>
                    <input type="password" name="claveUpN" id="usuarionew2" ><br><br>

                <input type="submit" name="formUpdate" value="update">
            </form>
            <?php   
        }

        function formDelete() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Baja de un usuario nuevo: </strong><br><br>
                <label for="alumnoDel">Escriba el login:</label>
                    <input type="text" name="loginDel" id="alumnoDel" ><br><br>

                <label for="passDel">Escriba la clave:</label>
                    <input type="password" name="claveDel" id="passDel" ><br><br>

                <input type="submit" name="formDelete" value="delete">
            </form>
            <?php   
        }
    ?>

</body>
</html>