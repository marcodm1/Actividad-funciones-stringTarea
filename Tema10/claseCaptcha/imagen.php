<?php
    function img($color) {
        switch($color) {
            case "rojo":
                ?>
                    <img src="img.php?colorR=255&colorG=0&colorB=0" alt="img"><br>
                <?php
                break;
            case "verde":
                ?>
                    <img src="img.php?colorR=0&colorG=255&colorB=0" alt="img"><br>
                <?php
                break;
            case "azul":
                ?>
                    <img src="img.php?colorR=0&colorG=0&colorB=255" alt="img"><br>
                <?php
                break;
        }
    }
?>

