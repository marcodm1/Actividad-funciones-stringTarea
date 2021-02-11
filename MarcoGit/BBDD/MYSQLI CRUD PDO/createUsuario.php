<?php
    if (!isset($_COOKIE['id'])){
            header("connLOGIN.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['apellido']) && !isset($_POST['pais']) && !isset($_POST['password']) ) {
        echo "Introduzca los campos correctamente.";
        formularioUsuario(); 
    }else {
        $name       = $_POST['name'];
        $apellido   = $_POST['apellido'];
        $pais       = $_POST['pais'];
        $password   = $_POST['password'];

        require_once("ConectaBD.php");
        $consulta = ConectaBD::singleton();
        $consulta->createUsuario($name, $apellido, $pais, $password);
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
    }

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                
                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="txtApellido"> Apellido:</label>
                    <input type="text" name="apellido" id="txtApellido"><br><br>
                <label for="txtPais"> Pais:</label>
                    <input type="text" name="pais" id="txtPais"><br><br>
                <label for="pwd"> Contraseña:</label>
                    <input type="password" name="password" id="pwd"><br><br>
            
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>