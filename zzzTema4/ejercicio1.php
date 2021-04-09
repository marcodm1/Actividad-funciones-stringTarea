<?php

    $mundo = array();

    $españa   = array("Madrid", "Barcelona", "Sevilla", "Valencia");
    $alemania = array("Berlín", "Múnich", "Hamburgo", "Bremen");
    $francia  = array("París", "Niza", "Burdeos", "Toulouse");
    $italia   = array("Roma", "Florencia", "Venecia", "Milán");
    array_push($mundo, $españa);
    array_push($mundo, $alemania);
    array_push($mundo, $francia);
    array_push($mundo, $italia);

    formulario($mundo);

    function formulario($mundo) {
        ?>
        <form action="nombreDelFichero.php" method="get">
        <?php 
            for ($i = 0; $i < count($mundo); $i++) {
                ?>
                <label for="pais<?php echo $i ?>"><?php echo "dd"; ?></label>
                <select name="<?php echo $i ?>[]" id="pais<?php echo $i ?>">
                <?php
                    for ($j = 0; $j < count($mundo[$i]); $j++) {
                        ?><option value="<?php echo $mundo[$i][$j] ?>"><?php echo $mundo[$i][$j] ?></option>
                    <?php
                    }
                    ?>
                </select><br><br>
        <?php
            } 
            ?>
            <input type="submit" value="enviar">
        </form>

        <?php
    }
?>
<!-- <label for="asignaturas"><strong>Seleccione su segunda asignatura:</strong></label>
                <select name="asignaturas[]" id="asignaturas" multiple>
                    <option value="DWES">DWES</option>
                    <option value="DWEC">DWEC</option>
                    <option value="DI">DI</option>
                </select><br><br> -->