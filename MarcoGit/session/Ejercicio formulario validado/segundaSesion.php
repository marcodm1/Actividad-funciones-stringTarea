<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="session">
	</head>
	<body>
   
    <?php
           session_start();

           print_r($_SESSION);
           echo "<br>";
           print_r($_COOKIE);
           echo "<br>";
           print_r($_POST);
          
       ?>
    </body>
    
</html>


