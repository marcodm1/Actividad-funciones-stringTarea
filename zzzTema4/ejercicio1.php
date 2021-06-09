<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
    <?php
        $mundo = array(
            "España"   => ["Madrid", "Barcelona", "Sevilla" , "Valencia"],
            "Alemania" => ["Berlín", "Múnich"   , "Hamburgo", "Bremen"  ],
            "Francia"  => ["París" , "Niza"     , "Burdeos" , "Toulouse"],
            "Italia"   => ["Roma"  , "Florencia", "Venecia" , "Milán"   ]
        );

        if (!empty($_GET)) {
            foreach ($mundo as $pais => $ciudades) {
                if (strcmp($_GET[$pais][0], "seleccione") !== 0) {
                    echo "<pre>";
                    print_r($pais);
                    echo ": ";
                    print_r($_GET[$pais][0]);
                    echo "</pre>";
                } 
            } 
            ?><a href="ejercicio1.php">Atras</a><?php
        }else {
            formulario($mundo);
        }
        
        function formulario($mundo) {
            ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?> " method="get">
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
</body>
</html>