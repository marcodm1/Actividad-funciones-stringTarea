<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
    <?php 
        require_once("opciones.php");
        
        $error = array();
        if (empty($_GET['host'])) {
            $host = "No ha rellenado el campo host";
            array_push($error, $host);
        }
        if (empty($_GET['usuario'])) {
            $host = "No ha rellenado el campo usuario";
            array_push($error, $host);
        }
        if (empty($_GET['nombre'])) {
            $host = "No ha rellenado el campo nombre";
            array_push($error, $host);
        }
        if (!empty($error)) {
            echo "<pre>";
            print_r($error);
            echo "</pre>";
            echo "jjjj";
            $_SESSION['error'] = true;
        }else {
            if (!empty($_SESSION['error'])) {
                unset($_SESSION['error']);
            }
            session_start();
            $_SESSION['host']    = $_GET['host'];
            $_SESSION['usuario'] = $_GET['usuario'];
            $_SESSION['passB']   = $_GET['passB'];
            $_SESSION['nombre']  = $_GET['nombre'];
        }
        
        if (empty($_SESSION['error'])) {
            $formu = 1;
            mostrarUsuarios();
            formularioModificacion();
            echo "dddd";
        }
        
        if (!empty($_GET['formMod'])) {
            $error = array();
            if (empty($_GET['alumno'])) {
                $host = "No ha rellenado el campo alumno";
                array_push($error, $host);
            }
            if (empty($_GET['passU'])) {
                $host = "No ha rellenado el campo contraseña";
                array_push($error, $host);
            }
            if (!empty($error)) {
                echo "<pre>";
                print_r($error);
                echo "</pre>";
                formularioBBDD();
                echo "kkkk";
            }
            session_start();
            $_SESSION['alumno']  = $_GET['alumno'];
            $_SESSION['passU']   = $_GET['passU'];
            $_SESSION['formMod'] = $_GET['formMod'];
        }

        if (!empty($_GET['formMod'])) {
            $conexion = new mysqli("localhost", "alumno", "1234","dwes2"); 
            if ($conexion->connect_errno) { 
                echo "Fallo al conectar a MySQL: " . $conexion->connect_error ;
            }else {
                if (!$conexion->set_charset("utf8")) { 
                    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
                }
                switch($_GET['formMod']) {
                    case "alta": 
                        $nombre    = $_SESSION['nombre'];
                        $passU     = $_SESSION['passU'];
                        $sentencia = $conexion->prepare("INSERT into usuarios values (marco, 123)");
                        // $sentencia->bind_param("si", $nombre, $passU);
                        // $sentencia->execute();
                        mostrarUsuarios();
                        formularioModificacion();
                        $sentencia->close();
                        echo "Estamos en el switch 1";
                        break;
                    case "modificacion":
                        $nombre = $_SESSION['nombre'];
                        $passM  = $_SESSION['passM'];
                        $consulta = "UPDATE usuarios as....";
                        mostrarUsuarios();
                        formularioModificacion();
                        echo "Estamos en el switch 2";
                        break;
                }

            }
        }

        function mostrarUsuarios() {
            require_once("bbdd.php");
            $host     = $_SESSION['host'];
            $usuario  = $_SESSION['usuario'];
            $passB    = $_SESSION['passB'];
            $nombre   = $_SESSION['nombre'];
            $bbdd     = new ConectaBD();
            $conexion = $bbdd->conecta($host, $usuario, $passB, $nombre);
            $usuarios = $bbdd->readP();
            ?>
            <table style="border: 2px solid black; background-color: #9BBF9D;">
                <tr><td>Resultado de la busqueda.</td></tr>
                <?php
                foreach ($usuarios as $resultado => $arrayValores) {
                    ?>
                    <tr  style="border: 1px solid black; background-color: #5EAC63;"><td>
                    <?php foreach ($arrayValores as $valor) {
                        echo $valor;
                    }
                    echo ": ";
                    ?>
                    </td></tr>
                    <?php
                }
            ?>
            </table>
            <?php
        }

        function formularioModificacion() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Modificación de la base de datos: </strong><br><br>
                <label for="alumno1">Escriba el nombre del alumno:</label>
                    <input type="text" name="alumno" id="alumno1" ><br><br>

                <label for="pass1">Escriba la contraseña:</label>
                    <input type="password" name="passU" id="pass1" ><br><br>

                <input type="submit" name="formMod" value="alta">
                <input type="submit" name="formMod" value="modificacion">
            </form>
            <?php   
        }
        ?> 
</body>
</html>