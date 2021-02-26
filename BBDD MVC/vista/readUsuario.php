<?php
    if (!isset($_COOKIE['id'])){
            echo "Error: No se ha logeado correctamente.";
            header("connLOGIN.php");
    }

    if ( !isset($_POST['name']) || !isset($_POST['pagina']) ) {
        echo "Rellene los campos.";
        formularioUsuario(); 
    }else {
        $name      = $_POST['name'];
        $numPagina = $_POST['pagina'];
        require_once("ConectaBD.php");
        $consulta  = ConectaBD::singleton();
        $resultado = $consulta->readUsuario($name, $numPagina);
        var_dump($resultado);
        ?>
            <li><a href="menu.php">Volver al menu</a></li>
        <?php
    }
        
    function formularioUsuario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="intPagina">Numero de pagina:</label>
                    <input type="number" name="pagina" id="intPagina"><br><br>
                
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>