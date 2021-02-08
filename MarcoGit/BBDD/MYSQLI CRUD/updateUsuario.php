<?php
    if (!isset($_COOKIE['name']) && isset($_COOKIE['password'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['password']) && !isset($_POST['password2']) && !isset($_POST['password3'])) {
        echo "Rellene los campos.";
        formularioUsuario(); 
    }else {
        require_once("ConectaBD.php");
        $consulta = ConectaBD::singleton();

        $name     = $_POST['name'];
        $password = $consulta->hashearContraseña($_POST['password']);
        
        $newPass  = $_POST['password2'];
        $newPass2 = $_POST['password3'];
        
        if ($newPass == $newPass2) {
            $newPass = $consulta->hashearContraseña($_POST['password2']);
            $consulta->updateUsuario($name, $password, $newPass);
            ?>
                <li><a href="menu.php">Volver al menu</a></li>
            <?php
        }else {
            formularioUsuario();
        }
    }
        

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="pwd1"> Contraseña actual:</label>
                    <input type="password" name="password" id="pwd1"><br><br>
                <label for="pwd2"> Nueva contraseña:</label>
                    <input type="password" name="password2" id="pwd2"><br><br>
                <label for="pwd3"> Repetir nueva contraseña:</label>
                    <input type="password" name="password3" id="pwd3"><br><br>
            
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>