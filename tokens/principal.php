<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio2 unodos">
	</head>
	<body>

    <?php 
       session_start();
        
       if(!isset($_SESSION['permiso'])){
           die();
       }else {
            $token = uniqid();
            $_SESSION['token'] = $token;
            ?>
                <form action="enviarDinero.php" method="post">

                    <label for="cant"><strong>Indique cantidad a enviar:</strong></label>
                        <input type="number" name="cantidad" id="cant" min="1"><br><br>

                <input type="hidden" name="token" value="<?php $token?>"/>
                <input type="submit" value="Enviar">
                <input type="button" onclick="location.href='cerrar.php'" value="Terminar y salir" />
           <?php
       } 
    
       
    ?> 

         
    
    </body>
</html>