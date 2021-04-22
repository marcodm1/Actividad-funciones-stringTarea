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
        $error = array();

        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio2.php" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                <input type="text"     name="nombre"    id="txtnombre" value="<?php echo comprobar("nombre"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="numEdad">Es mayor de 18 años?:</label>
                <input type="checkbox" name="edadmas"   id="numEdad" <?php echo comprobar("edadmas"); ?>><br><br>

            <label for="numEdad">Es menor de 18 años?:</label>
                <input type="checkbox" name="edadmenos" id="numEdad" <?php echo comprobar("edadmenos"); ?>><br><br>

            <!-- probar a hacer un array de checkeds -->
            <label for="checkList[]">Seleccione lo que quiere en la mesa:</label><br> <!-- no se si hay que poner o no esta linea -->
            <input type="checkbox" name="checkList[]" value="cuchara"    <?php echo comprobarAñadidos("checkList", "cuchara") ?>>   <label>cuchara     </label><br/>
            <input type="checkbox" name="checkList[]" value="tenedor"    <?php echo comprobarAñadidos("checkList", "tenedor") ?>>   <label>tenedor     </label><br/>
            <input type="checkbox" name="checkList[]" value="cuchillo"   <?php echo comprobarAñadidos("checkList", "cuchillo") ?>>  <label>cuchillo    </label><br/>
            <input type="checkbox" name="checkList[]" value="plato"      <?php echo comprobarAñadidos("checkList", "plato") ?>>     <label>plato       </label><br/>
            <input type="checkbox" name="checkList[]" value="vaso"       <?php echo comprobarAñadidos("checkList", "vaso") ?>>      <label>vaso        </label><br/>
            <input type="checkbox" name="checkList[]" value="copa"       <?php echo comprobarAñadidos("checkList", "copa") ?>>      <label>copa        </label><br/>
            <input type="checkbox" name="checkList[]" value="servilleta" <?php echo comprobarAñadidos("checkList", "servilleta") ?>><label>servilleta  </label><br/>
          
            <label for="plato">Seleccione su plato principal:</label><br>
                    <input type="radio" name="plato" value="macarrones" <?php echo comprobarRadio("plato", "macarrones") ?>>
                <label for="macarrones">Macarrones con chorizo</label><br>
                    <input type="radio" name="plato" value="carbonara"  <?php echo comprobarRadio("plato", "carbonara") ?>>
                <label for="carbonara"> Pasta carbonara </label><br>
                    <input type="radio" name="plato" value="pizza"      <?php echo comprobarRadio("plato", "pizza") ?>>
                <label for="pizza">     Pizza           </label><br>
                    <input type="radio" name="plato" value="burguer"    <?php echo comprobarRadio("plato", "burguer") ?>>
                <label for="burguer">   Burguer         </label><br><br>

            <label for="horario">Seleccione su horario:</label>
                <select name="horario[]">
                    <option >Seleccione</option>
                    <option value="comidas" <?php echo comprobarHorario("horario", "comidas"); ?>>Comidas</option>
                    <option value="cenas"   <?php echo comprobarHorario("horario", "cenas"); ?>  >Cenas</option>
                </select><br>
            <input type="submit" value="enviar">
        </form>
        <?php
    }

    function comprobar($name1) {
        $name = $name1;
        if (isset($_POST[$name])) {
            switch ($name) {
                case "nombre":    return $_POST[$name];
                case "edadmas":   return 'checked="checked"';
                case "edadmenos": return 'checked="checked"';
            }
        } 
    }

    function comprobarAñadidos($name1, $extra) {
        $name = $name1;
        foreach ($_POST[$name] as $clave => $valor) {
            if ($valor == $extra) {
                return 'checked="checked"';
            }
        }
    }

    function comprobarRadio($name1, $comida) {
        $name = $name1; 
        if (isset($_POST[$name]) && $_POST[$name] == $comida) {
            return 'checked="checked"';
        } 
    }

    function comprobarHorario($horario1, $comer) {
        $horario = $horario1;
        if (isset($_POST[$horario]) && $_POST[$horario] == $comer) {
            return 'selected="selected"';
        } 
    }


?>
   