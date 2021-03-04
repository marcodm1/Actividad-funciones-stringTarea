<?php
    formularioUpdate(); 
    
    function formularioUpdate(){
        ?>
            <form action="../controlador/controladorVista.php" method="GET">

                <label for="txtNombre">Nombre actual:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="txtNombre1">Nuevo nombre:</label>
                    <input type="text" name="nameNuevo" id="txtNombre1"><br><br>
                <label for="txtNombre2">Repetir nuevo nombre:</label>
                    <input type="text" name="nameNuevoRep" id="txtNombre2"><br><br>
                    <input type="hidden" name="hiddenActualizar" id="pwd"><br><br>
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>