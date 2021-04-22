<?php
    if (!empty($_POST['nombre']) ) {
        $a = "nombre";

        var_dump($_POST['nombre']);
        echo "<br>";
        var_dump($_POST[$a]);
        


    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="123Pruebas.php" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                <input type="text" name="nombre" id="txtnombre" minlength="5" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br> <!-- no me funciona minlength -->

            <input type="submit" value="enviar">
        </form>
        <?php
    }

?>