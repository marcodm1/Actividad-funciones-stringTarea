<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="examen Ej:3">
	</head>
	<body>
        <?php

            if (isset($_POST['color']) && isset($_POST['texto'])){
                mostrarCookies();
            }else {
                ?>
                    <p style="color: red"> bienvenido </p>
                <?php 
            }
            
 
            function mostrarCookies(){
                ?>
                    <p style="color: <?php echo $_COOKIE['color']; ?>"> 
                        <?php echo $_COOKIE['texto']; ?> 
                    </p>
                <?php
            } 
        
        ?>
        

    </body>
</html>