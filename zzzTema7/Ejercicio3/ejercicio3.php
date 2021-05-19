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
        /*
        Requisitos previos:
        - Lee el documentos y realiza las prácticas: 05_17_ext_mysqli_2.pdf
        - Consulta: https://www.php.net/manual/es/class.mysqli.php ,  https://www.php.net/manual/es/class.mysqli-result.php y https://www.php.net/manual/es/class.mysqli-stmt.php
        - Ejecuta el sql de creación de las tablas y el usuario.

        Práctica: 
        - Crear Bbdd.php //con una clase para realizar todas las operaciones de conexión, consulta y modificación de la base de datos. 
        - Mostrar todos los usuarios dados de alta en la base de datos (usar mysqli_result::fetch_all)
        - Crea un formularioBBD para modificar o insertar usuarios, method post.
        - Utilizando mysqli.
        - Utilizar el usuario alumno
        - Mostrar el error si se produce en la conexión, y en la consulta.

        Bbdd.php:
        - Clase Bbdd.
        - Propiedad $con //conexión con la base de datos mysqli
        - método conecta($host, $usuario, $password, $bbdd) //realiza la conexión con la base de datos y establece el juego de caracteres.
        - método consultaUsuarios() //devuelve un array con todos los usuarios, utilizar fetch_all.
        - método muestraTabla($array) //recibe el array del fetch_all y muestra las filas en formato de tabla.
        - método altaUsuarios($login, $clave) //da de alta el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        - método modificaUsuarios($login, $clave) //modifica el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        - método close() //cierra la conexión.

        ejercicio3.php: 
        - utilizar la clase Bbdd para conectar la base de datos.
        - Realizar la consulta de usuarios y mostrarlos en formato de tabla //Bbdd::consultaUsuarios y Bbdd::muestraTabla
        - Mostrar un formularioBBD para insertar o modificar usuarios con dos botones: ALTA, y MODIFICACIÓN.
        - Comprobar que ha introducido el login y la clave y que la clave tiene al menos 5 caracteres.
        - Dar de alta o modificar el usuario //Bbdd::altaUsuarios y Bbdd::modificaUsuarios
        */
        if (!empty($_GET['formBBDD'])) {
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
                formularioBBDD();
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
        }else {
            if (empty($_GET['formMod'])) {
                formularioBBDD();
                echo "ffff";
            }
        }
        if (!empty($_GET['formBBDD']) && empty($_SESSION['error'])) {
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
            $bbdd     = new Bbdd();
            $conexion = $bbdd->conecta($host, $usuario, $passB, $nombre);
            $usuarios = $bbdd->consultaUsuarios();
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

        function formularioBBDD() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            <br><br><strong>Conexión a la base de datos: </strong><br><br>
                <label for="host1">Escriba el nombre del host:</label>
                    <input type="text" name="host" id="host1" ><br><br>

                <label for="usuario1">Escriba el nombre del usuario:</label>
                    <input type="text" name="usuario" id="usuario1" ><br><br>

                <label for="pass1">Escriba la contraseña:</label>
                    <input type="password" name="passB" id="pass1" ><br><br>

                <label for="bbdd1">Escriba el nombre de la base de datos:</label>
                    <input type="text" name="nombre" id="bbdd1" ><br><br>

                <input type="submit" name="formBBDD" value="enviar">
            </form>
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