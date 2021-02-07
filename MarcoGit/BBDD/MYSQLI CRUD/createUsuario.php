<?php
    if (!isset($_COOKIE['name']) && isset($_COOKIE['password'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
    }

    if ( !isset($_POST['id']) &&!isset($_POST['name']) && !isset($_POST['apellido']) && !isset($_POST['pais']) && !isset($_POST['password']) ) {
        echo "no ha introducido los campos correctamente";
        formularioUsuario(); 
    }else {
        $id         = $_POST['id'];
        $name       = $_POST['name'];
        $apellido   = $_POST['apellido'];
        $pais       = $_POST['pais'];
       
        require_once("ConectaBD.php");
        $consulta = ConectaBD::singleton();
        $password = $consulta->hashearContraseña($_POST['password']);
        $consulta->createUsuario($id, $name, $apellido, $pais, $password);
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
    }

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label for="id">ID:</label>
                    <input type="text" name="id" id="id"><br><br>
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