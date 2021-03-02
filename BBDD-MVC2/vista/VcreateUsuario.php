<?php
    if (!isset($_COOKIE['id'])){
            header("Location:connLOGIN.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['apellido']) && !isset($_POST['pais']) && !isset($_POST['password']) ) {
        echo "Introduzca los campos correctamente.";
        formularioCrear(); 
    }else {
        require_once("./controlador/CcreateUsuario.php");
        require_once("./vista/Vmenu.php");
    }

    function formularioCrear(){
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