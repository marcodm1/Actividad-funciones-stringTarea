<?php
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['nameNuevo']) && !isset($_POST['nameNuevoRep']) ) {
        formularioUpdate(); 
    }else {
        require_once("./controlador/CuldateUsuario.php");
    }
       
    function formularioUpdate(){
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