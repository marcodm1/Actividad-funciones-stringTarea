<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="ejercicioExamen">
</head>
<body>

<?php
    echo "BINGOOOOOOOOOO!";
    mostrarFormulario();
   
    function mostrarFormulario(){
        ?>
            <form action="bingo.php" method="post">
                <input type="submit" value="Pulse para volver a jugar">
            </form> 
        <?php

    }



?>
</body>
</html>