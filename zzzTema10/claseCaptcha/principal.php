<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="captcha">
</head>
<body>

    <!-- <img src="rectangulo1.php" alt="img1"><br>
    <img src="rectangulo2.php" alt="img2"><br>
     -->


<?php

    if (!empty($_POST['color1']) || !empty($_POST['color2']) || !empty($_POST['color3'])) {
        require_once("./imagen.php");
        
        for ($i = 0; $i < 3; $i++) {
            ?>
                <img src="imagen.php" alt="img"><br>
            <?php
        }
    }else {
        mostrarFormulario();
    }

    function mostrarFormulario(){
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            De que color quieres los rectángulos ?<br><br>
            <label for="horario">Rectángulo 1:</label>
                <select id="horario" name="color1[]">
                    <option value="seleccione">Seleccione</option>
                    <option value="rojo" >Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="azul" >Azul</option>
                </select><br>
        
            <label for="horario">Rectángulo 2:</label>
                <select id="horario" name="color2[]">
                    <option value="seleccione">Seleccione</option>
                    <option value="rojo" >Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="azul" >Azul</option>
                </select><br>

            <label for="horario">Rectángulo 3:</label>
                <select id="horario" name="color3[]">
                    <option value="seleccione">Seleccione</option>
                    <option value="rojo" >Rojo</option>
                    <option value="verde">Verde</option>
                    <option value="azul" >Azul</option>
                </select><br>
            <input type="submit" value="enviar"><br><br>
        
        </form>
        <?php
    }
    ?>

</body>
</html>
