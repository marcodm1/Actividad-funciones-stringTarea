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
        - Crea un formulario para modificar o insertar usuarios, method post.
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
        - Mostrar un formulario para insertar o modificar usuarios con dos botones: ALTA, y MODIFICACIÓN.
        - Comprobar que ha introducido el login y la clave y que la clave tiene al menos 5 caracteres.
        - Dar de alta o modificar el usuario //Bbdd::altaUsuarios y Bbdd::modificaUsuarios
        */
    
    
    ?>
</body>
</html>