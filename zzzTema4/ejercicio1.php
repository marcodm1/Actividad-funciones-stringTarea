<?php
    $mundo = array(
        "España"   => ["Madrid", "Barcelona", "Sevilla" , "Valencia"],
        "Alemania" => ["Berlín", "Múnich"   , "Hamburgo", "Bremen"  ],
        "Francia"  => ["París" , "Niza"     , "Burdeos" , "Toulouse"],
        "Italia"   => ["Roma"  , "Florencia", "Venecia" , "Milán"   ]
    );

    // foreach ($mundo as $clave => $clave => $valor) {
    //     if (isset($_GET['España']) ) {
            
    //     }else {
    //         formulario($mundo);
    //     }

    // }

    if ($_GET['España'] != null) {
        echo "hhihihih";
    } else {
        formulario($mundo);
    }
    


    function formulario($mundo) {
        ?>
        <form action="nombreDelFichero.php" method="get">
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
