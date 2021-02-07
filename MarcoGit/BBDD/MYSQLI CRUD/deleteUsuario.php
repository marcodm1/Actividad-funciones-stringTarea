<?php
    if (!isset($_COOKIE['name']) && isset($_COOKIE['password'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['password'])) {
        echo "no ha introducido los campos correctamente";
        formularioUsuario(); 
    }else {
        require_once("ConectaBD.php");
        $consulta = ConectaBD ::singleton();
        $name     = $_POST['name'];
        $password = $consulta->hashearContraseña($_POST['password']);

        $consulta->deleteUsuario($name, $password);
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
        
    }
        

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="pwd"> Contraseña:</label>
                    <input type="password" name="password" id="pwd"><br><br>
                
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>