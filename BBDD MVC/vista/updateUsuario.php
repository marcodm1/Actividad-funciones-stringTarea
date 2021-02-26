<?php
    if (!isset($_COOKIE['id'])){
            echo "Error: No se ha logeado correctamente.";
            header("logearse.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['nameNuevo']) && !isset($_POST['nameNuevoRep']) ) {
        echo "Rellene los campos.";
        formularioUsuario(); 
    }else {
        require_once("ConectaBD.php");
        $consulta       = ConectaBD::singleton();
        $name           = $_POST['name'];
        $nameNuevo      = $_POST['nameNuevo'];
        $nameNuevoRep   = $_POST['nameNuevoRep'];
        $id             = $_COOKIE['id'];
        if ($nameNuevo != $nameNuevoRep){
            formularioUsuario();
        }
        $consulta->updateUsuario($name, $nameNuevo, $id);
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
        
      
    }
        

    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

                <label for="txtNombre">Nombre actual:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="txtNombre1">Nuevo nombre:</label>
                    <input type="text" name="nameNuevo" id="txtNombre1"><br><br>
                <label for="txtNombre2">Repetir nuevo nombre:</label>
                    <input type="text" name="nameNuevoRep" id="txtNombre2"><br><br>
            
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>