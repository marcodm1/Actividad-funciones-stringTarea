<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="captcha">
</head>
<body>
<?php

if (!empty($_GET['color1']) && !empty($_GET['color2']) && !empty($_GET['color3'])) {
    if ($_GET['color1'][0] == "seleccione" || $_GET['color2'][0] == "seleccione" ||$_GET['color3'][0] == "seleccione") {
        mostrarFormulario();
    }else {
        require_once("imagen.php");
        img($_GET['color1'][0]);
        img($_GET['color2'][0]);
        img($_GET['color3'][0]);
    }
}else {
    mostrarFormulario();
}

    function mostrarFormulario(){
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
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
