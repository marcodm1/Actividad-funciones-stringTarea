<?php
    formularioCrear(); 
 
    function formularioCrear(){
        ?>
            <form action="../controlador/controladorVista.php" method="GET">
                
                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="txtApellido"> Apellido:</label>
                    <input type="text" name="apellido" id="txtApellido"><br><br>
                <label for="txtPais"> Pais:</label>
                    <input type="text" name="pais" id="txtPais"><br><br>
                <label for="pwd"> Contraseña:</label>
                    <input type="password" name="password" id="pwd"><br><br>
                    <input type="hidden" name="hiddenCrear" id="pwd"><br><br>
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>