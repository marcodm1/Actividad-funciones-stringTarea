<?php
    if (!isset($_COOKIE['id'])){
        echo "Error: No se ha logeado correctamente.";
        header("logearse.php");
    }
    
    if (!isset($_POST['id']) && !isset($_POST['password'])){
        formularioUsuario();
    }else {
        require_once("ConectaBD.php");
        $consulta = ConectaBD::singleton();
        $id       = $_POST['id'];
        $password = $_POST['password'];
        if (!$consulta->deleteUsuario($id, $password) ) {
            echo "Ha introducido mal algun dato";
        }else {
            echo "Eliminado correctamente";
        }
        
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
        
    }
        

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

                <label for="txtNombre">Id:</label>
                    <input type="text" name="id" id="txtNombre"><br><br>
                <label for="pwd"> Contraseña:</label>
                    <input type="password" name="password" id="pwd"><br><br>
                
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>


