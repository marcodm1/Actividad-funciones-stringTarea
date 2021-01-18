<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro para el BlcakJack</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Black Jack">
        <link rel="stylesheet" href="index.css">
	</head>
	<body>
    <img src="/JavaScript/JS/ejercicios/img/img/0.png" name="imagen"> 
        <script>
            var imgArray = new Array("0.png", "1.png", "2.png", "3.png");
            cambiarFoto();
            function cambiarFoto(){
                var numero = Math.floor(Math.random()*4);
                document.images["imagen"].src = "/JavaScript/JS/ejercicios/img/img/" + imgArray[numero];
                setTimeout(cambiarFoto, 1000);
            }
        </script>

        <?php
            session_start();
            session_destroy();
            if (!empty($_POST['check'])){
                if ($_POST['check'] == true) {  // salta error linea 14
                    session_start();
                    $_SESSION['nombre'] = $_POST['nombre'];
                    $_SESSION['nombre'] = $_POST['nombre'];

                    header("Location:back.php");
                }else {
                    formulario();
                }
                 
            }else {
                formulario();
            }
                
            function formulario() {
                ?>
                    <div class="registro">
                        <h2>Bienvenido al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label class="campoNombre" for="txtNombre">Escribe tu nombre:</label>
                            <input type="text" name="nombre" id="txtNombre" value="Marco">

                        <label class="campoCantidad" for="numCantidad">Con cuánto dinero ha venido a jugar?</label>
                            <input type="number" name="cantidad" id="numCantidad" value="10">

                        <label class="campoEdad" for="check"><strong>Marque si es mayor de edad:</strong></label>
                            <input type="checkbox" name="check">

                        <input type="submit" value="jugar">
                    </div>
                <?php
            }
        
        ?>
    </body>
</html>




