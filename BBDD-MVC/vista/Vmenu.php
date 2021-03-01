
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
        if (!isset($_COOKIE['id'])){
            require_once("./controlador/Clogearse.php");
        }

        formularioUsuario();

        function formularioUsuario(){
            ?>
                <p>Elija una opción del menu:</p>
                <div>
                    <form action="./controlador/CcreateUsuario.php" method="post">
                        <input type="submit" value="Crear usuario"><br>
                    </form>

                    <form action="./controlador/CdeleteUsuario.php" method="post">
                        <input type="submit" value="Eliminar usuario"><br>
                    </form>

                    <form action="./controlador/CreadUsuario.php" method="post">
                        <input type="submit" value="Mostrar usuario"><br>
                    </form>

                    <form action="./controlador/CupdateUsuario.php" method="post">
                        <input type="submit" value="Actualiza usuario"><br>
                    </form>

                        
                </div>
            <?php
        }
    ?>

</body>
</html>