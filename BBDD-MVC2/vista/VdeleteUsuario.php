<?php
    formularioDelete();
  
    function formularioDelete(){
        ?>
            <form action="../controlador/controladorVista.php" method="GET">

                <label for="txtNombre">Id:</label>
                    <input type="text" name="id" id="txtNombre"><br><br>
                    <input type="hidden" name="hiddenEliminar" id="pwd"><br><br>
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>


