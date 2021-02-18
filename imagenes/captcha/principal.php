
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="captcha.css">

</head>
<body>
    <div class="principal">
        <div class="captcha1">
            <img src="captcha.php">
        </div>
        <div class="formulario1">
            <?php  
                mostrarFormulario(); 
            ?> 
        </div>
    </div>
    


    
    <?php    
        function mostrarFormulario(){
            ?>
                <form action="captcha.php" method="post">
                    <label for="intNombre">Escriba el captcha:</label>
                        <input type="number" name="porcentaje" id="intNombre"><br>
                    <input type="submit" value="enviar">
                </form> 
            <?php
        }
    ?>
</body>
</html>

