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
        - Crea un formularioBBDD para modificar o insertar usuarios, method post.
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
        - Mostrar un formularioBBDD para insertar o modificar usuarios con dos botones: ALTA, y MODIFICACIÓN.
        - Comprobar que ha introducido el login y la clave y que la clave tiene al menos 5 caracteres.
        - Dar de alta o modificar el usuario //Bbdd::altaUsuarios y Bbdd::modificaUsuarios
        */
        if (!empty($_POST['enviado1'])) {
            $error = array();
            if (empty($_POST['host'])) {
                $host = "No ha rellenado el campo host";
                array_push($error, $host);
            }
            if (empty($_POST['usuario'])) {
                $host = "No ha rellenado el campo usuario";
                array_push($error, $host);
            }
            if (empty($_POST['passBD'])) {
                $host = "No ha rellenado el campo pass";
                array_push($error, $host);
            }
            if (empty($_POST['bbdd'])) {
                $host = "No ha rellenado el campo bbdd";
                array_push($error, $host);
            }
            if (!empty($error)) {
                echo "<pre>";
                print_r($error);
                echo "</pre>";
                formularioBBDD();
            }
            session_start();
            $_SESSION['host']    = $_GET['host'];
            $_SESSION['usuario'] = $_GET['usuario'];
            $_SESSION['passBD']    = $_GET['pass'];
            $_SESSION['bbdd']    = $_GET['bbdd'];
        }else {
            formularioBBDD();
        }

        if (!empty($_POST['enviado2'])) {
            $error = array();
            if (empty($_POST['alumno'])) {
                $host = "No ha rellenado el campo alumno";
                array_push($error, $host);
            }
            if (empty($_POST['passUsuario'])) {
                $host = "No ha rellenado el campo contraseña";
                array_push($error, $host);
            }
            if (!empty($error)) {
                echo "<pre>";
                print_r($error);
                echo "</pre>";
                formularioBBDD();
            }
            session_start();
            $_SESSION['alumno'] = $_GET['pass'];
            $_SESSION['bbdd']   = $_GET['bbdd'];
            // aqui preguntar por alta o modificacion
        }else {
            formularioModificacion();
        }
        require_once("ConectaBD.php");
        $host       = $_SESSION['host'];
        $usuario    = $_SESSION['usuario'];
        $password   = $_SESSION['pass'];
        $bbdd       = $_SESSION['bbdd'];
    
        $bbdd     = new Bbdd();
        $conexion = $bbdd->conecta($host, $usuario, $password, $bbdd);
        $usuarios = $bbdd->consultaUsuarios();
        mostrarUsuarios($usuarios);
        formularioModificacion();


        function mostrarUsuarios($usuarios) {
            ?>
            <table style="border: 2px solid black; background-color: #9BBF9D;">
                <tr><td>Resultado de la busqueda</td></tr>
                <?php
                foreach ($usuarios as $fila) {
                    ?>
                    <tr  style="border: 1px solid black; background-color: #5EAC63;"><td>
                    <?php echo $fila . ": ";
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
                <strong>Conexión a la base de datos: </strong><br>
                <label for="host1">Escriba el nombre del host:</label>
                    <input type="text" name="host" id="host1" ><br><br>

                <label for="usuario1">Escriba el nombre del usuario:</label>
                    <input type="text" name="usuario" id="usuario1" ><br><br>

                <label for="pass1">Escriba la contraseña:</label>
                    <input type="password" name="passBD" id="pass1" ><br><br>

                <label for="bbdd1">Escriba el nombre de la base de datos:</label>
                    <input type="text" name="bbdd" id="bbdd1" ><br><br>

                <input type="submit" name="enviado1" value="enviar">
            </form>
            <?php   
        }

        function formularioModificacion() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <strong>Modificación de la base de datos: </strong><br>
                <label for="alumno1">Escriba el nombre del alumno:</label>
                    <input type="text" name="alumno" id="alumno1" ><br><br>

                <label for="pass1">Escriba la contraseña:</label>
                    <input type="password" name="passUsuario" id="pass1" ><br><br>

                <input type="button" name="enviado2" value="ALTA">
                <input type="button" name="enviado2" value="MODIFICACION">
            </form>
            <?php   
        }
        ?> 


// $consulta = "Select * from usuarios;"; 
            // if (mysqli_query($conexion , $consulta)) {
            //     $resultadoConsulta = mysqli_query($conexion , $consulta); 
            // }else {
            //     echo "Error al intentar conectarse con la base de datos:";
            // }
    
            // $totalResultados = mysqli_num_rows($resultadoConsulta); 
    
    
            // // Ajustar el puntero de resultado a una fila concreta
            // $resultadoConsulta->data_seek($totalResultados -1);
    
            // // obtenemos la fila
            // $fila = $resultadoConsulta->fetch_row();
    
            // // mostramos la fila
            // echo "<pre>";
            // print_r($fila);
            // echo "</pre>";
            // $conexion->close();
</body>
</html>