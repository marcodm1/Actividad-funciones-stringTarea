<?php
    $mundo = array(
        "España"   => ["Madrid", "Barcelona", "Sevilla" , "Valencia"],
        "Alemania" => ["Berlín", "Múnich"   , "Hamburgo", "Bremen"  ],
        "Francia"  => ["París" , "Niza"     , "Burdeos" , "Toulouse"],
        "Italia"   => ["Roma"  , "Florencia", "Venecia" , "Milán"   ]
    );

    
    $cont = 0;
    foreach ($mundo as $pais => $ciudades) {
        if (isset($_GET[$pais])) {
            if ($_GET[$pais][0] != "seleccione") {
                echo "<pre>";
                print_r($pais);
                echo ": ";
                print_r($_GET[$pais][0]);
                echo "</pre>";
                $cont ++;
            }
        } 
    }
    if ($cont == 0) {
        formulario($mundo);
    }
    


    function formulario($mundo) {
        ?>
        <form action="ejercicio1.php" method="get">
        <?php 
            foreach ($mundo as $pais => $array) {
                ?>
                <label for="<?php echo $pais ?>"><?php echo $pais . ":"; ?></label>
                <select name="<?php echo $pais ?>[]" id="<?php echo $pais ?>">
                <option value="seleccione">--Ninguno--</option>
                <?php
                    foreach ($array as $ciudad){
                        ?><option value="<?php echo $ciudad ?>"><?php echo $ciudad; ?></option>
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
