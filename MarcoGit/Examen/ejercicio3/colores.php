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
            if (isset($_POST['color']) && isset($_POST['texto']) ){
               
                setcookie("color", $_POST['color'], time() +300, 'http://localhost/PHP-GIT/MarcoGit/zzz%20examen/', 'localhost', true);
                setcookie("texto", $_POST['texto'], time() +300, 'http://localhost/PHP-GIT/MarcoGit/zzz%20examen/', 'localhost', true);
                
                header("Location:colores_mostrar.php");
            }else {
                echo "Tiene que rellenar ambos campos.<br><br>";
                mostrarFormulario();
            }

            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="color">Escriba el color en ingles:</label>
                        <input type="text" name="color" id="color" ><br><br>

                    <label for="texto">Escriba el texto:</label>
                        <input type="text" name="texto" id="texto"><br><br>

                    <input type="submit" value="enviar">

                <?php
            }
        
        ?>
        

    </body>
</html>