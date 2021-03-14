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
            // require_once("loginUsuario.php");
            // require_once("altaEvento.php");
            // require_once("conexion.php"); 
            require_once("comprobaciones.php");


            if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['evento']) && isset($_POST['descripcion']) && isset($_POST['lugar']) && isset($_POST['fecha']) && isset($_POST['hora']) ) {  
                $login       = $_POST['login'       ];
                $password    = $_POST['password'    ];
                $evento      = $_POST['evento'      ];
                $descripcion = $_POST['descripcion' ];
                $lugar       = $_POST['lugar'       ];
                $fecha       = $_POST['fecha'       ];
                $hora        = $_POST['hora'        ];
                
                if (!eventOk() ) {
                    echo "wadawdaw";
                    formularioEvento();
                }else {
                    // tiene algo true
                } 

            }else {
                formularioEvento();
            }
                
            function formularioEvento(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                        <label for="intLogin">login:</label>
                            <input type="number" name="login" id="intLogin"     value="<?php if(isset($_POST['login'])){echo htmlspecialchars($_POST['login']);} ?>"><br><br> <!-- htmlspecialchars para XSS -->

                        <label for="pass">contraseña:</label>
                            <input type="password" name="password" id="pass"    value="<?php if(isset($_POST['password'])){echo htmlspecialchars($_POST['password']);} ?>"><br><br>

                        <label for="txtEv">nombre evento:</label>
                            <input type="text" name="evento" id="txtEv"         value="<?php if(isset($_POST['evento'])){echo htmlspecialchars($_POST['evento']);} ?>"><br><br>

                        <label for="txtDesc">descripcion:</label>
                            <input type="text" name="descripcion" id="txtDesc"  value="<?php if(isset($_POST['descripcion'])){echo htmlspecialchars($_POST['descripcion']);} ?>"><br><br>

                        <label for="txtlugar">lugar:</label>
                            <input type="text" name="lugar" id="txtlugar"       value="<?php if(isset($_POST['lugar'])){echo htmlspecialchars($_POST['lugar']);} ?>"><br><br>

                        <label for="timeF">fecha validez:</label>
                            <input type="date" name="fecha" id="timeF"          value="<?php if(isset($_POST['fecha'])){echo htmlspecialchars($_POST['fecha']);} ?>"><br><br>

                        <label for="horaE">hora del evento:</label>
                            <input type="time" name="hora" id="horaE"           value="<?php if(isset($_POST['hora'])){echo htmlspecialchars($_POST['hora']);} ?>"><br><br>

                        <input type="submit" value="alta">
                    </form> 
                <?php
            }
        ?>
    </body>
</html>