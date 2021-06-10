
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  
        mostrarFormulario();
        function mostrarFormulario(){
            ?>
            <form action="circulo.php" method="post">
                <label for="intNombre">Escriba un porcentaje a rellenar del 1 al 100:</label>
                    <input type="number" name="porcentaje" id="intNombre" min="1" max="100"><br>
                <input type="submit" value="enviar">
            </form> 
            <?php
        }
    ?>
</body>
</html>

