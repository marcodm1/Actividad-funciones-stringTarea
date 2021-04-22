<?php
    if (!empty($_POST['nombre']) && !empty($_POST['edad']) && !empty($_POST['plato']) && !empty($_POST['horario'])) {
        echo "<ol>";
        foreach ($_POST as $algo) {
            if (is_array($algo)) {
                foreach ($algo as $clave => $valor) {
                    echo "<li>" . $valor . "</li>";
                }
            }else {
                echo "<li>" . $algo . "</li><br>";
            }
        }
        echo "</ol>";
    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="123Pruebas.php" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                <input type="text" name="nombre" id="txtnombre" minlength="5" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br> <!-- no me funciona minlength -->

            <label for="numEdad">Es mayor de 18 años?:</label>
                <input type="checkbox" name="edad" id="numEdad" ><br><br>

            <label for="plato">Seleccione su plato principal:</label><br>
                    <input type="radio" name="plato" value="macarrones">
                <label for="macarrones">Macarrones con chorizo</label><br>
                    <input type="radio" name="plato" value="carbonara">
                <label for="carbonara"> Pasta carbonara </label><br>
                    <input type="radio" name="plato" value="pizza">
                <label for="pizza">     Pizza           </label><br>
                    <input type="radio" name="plato" value="burguer">
                <label for="burguer">   Burguer         </label><br><br>

            <label for="horario">Seleccione su horario:</label>
                <select name="horario[]">
                    <option value="comidas">Comidas</option>
                    <option value="cenas">Cenas</option>
                </select><br>
            <input type="submit" value="enviar">
        </form>
        <?php
    }

?>