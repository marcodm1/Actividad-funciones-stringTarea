<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="examen">
	</head>
	<body>
        <?php
            $errores = false;
            $listaErrores = array();

            if (isset($_POST['nombreJuego']) && isset($_POST['efectividad']) &&
                isset($_POST['fechaEntrega']) && isset($_POST['logo']) ){
               
                
 
                if (isset($_POST['fechaEntrega'])){
                    $fechaAhora             = date("d-m-Y");
                    $fechaEntrega           = $_POST['fechaEntrega'];
                    $fechaEntredaCarencia   = date("d-m-Y",strtotime($fecha_actual . CONSTANTE . " day"));

                    if ($fecha_actual > $fechaEntrega){
                        $errores = true;
                        $listaErrores[] = "Error: la fecha de entrega tiene que ser posterior a la actual.";
                    }
                }



                if (!$errores){
                    
                }else{
                    foreach ($listaErrores as &$valor) {
                        echo $valor;
                    }
                    mostrarFormulario();
                }

             
            }else {
                mostrarFormulario();
                }

            function mostrarFormulario(){
                ?>
                
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                <label for="nombreVacuna">Nombre de la vacuna:</label>
                    <input type="text" name="nombreVacuna" id="nombreVacuna" ><br><br>

                <label for="efectividad">Efectividad en %:</label> 
                    <input type="number" name="efectividad" id="efectividad" min="0" max="100"><br><br> 
                  
                <label for="fechaEntrega">Seleccione una fecha de entrega:</label>
                    <input type="date" name="fechaEntrega" id="fechaEntrega" value="<?php if (isset($_POST['fechaEntrega'])){echo $_POST['fechaEntrega'];} ?>"><br><br><!-- hacer la constante   --> 
                    
                <label for="logo">Seleccione el logotipo de la empresa:</label>
                    <input type="file" name="logo" id="logo"><br><br>
                    
                

                <input type="submit" value="enviar">

                <?php
            }
        
        ?>
        

    </body>
</html>