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
            if (!isset($_SESSION['permiso']) ){ 
                if (isset($_POST['nombre']) && isset($_POST['contrasenia']) ){
                    if ($_POST['nombre'] == "marco" && $_POST['contrasenia'] == "123"){
                        $_SESSION['permiso'] = "marco";
                        header("Location:principal.php");
                    }else{
                        echo "Error en usuario o contraseña incorrecto";
                        header("Location:inicio.php");
                    }
                }else {
                    echo "Tiene que rellenar todos los campos";
                    header("Location:inicio.php");
                }
            }else {
                header("Location:inicio.php");
            }
        ?>

        
        


      
    </body>
</html>