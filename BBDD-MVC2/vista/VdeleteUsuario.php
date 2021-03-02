<?php
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }
    
    if (!isset($_POST['id']) && !isset($_POST['password'])){
        formularioDelete();
    }else {
        require_once("./controlador/CdeleteUsuario.php");
    }
        
    function formularioDelete(){
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


