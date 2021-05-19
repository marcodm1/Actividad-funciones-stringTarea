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
- Lee el documentos y realiza las prácticas: 05_18_API_PDO.pdf y 05_20_Singleton.pdf
- Consulta: https://www.php.net/manual/es/class.pdo y https://www.php.net/manual/es/class.pdostatement.php
- Ejecuta el sql de creación de las tablas y el usuario.

Práctica: 
- Crear ConectaBD.php //con una clase para realizar todas las operaciones de conexión, consulta de la base de datos. 

ConectaBD.php:
- Clase ConectaBD.
- Usa el patrón singleton, y pon las propiedades y los métodos que consideres oportunos.

ejercicio3.php: 
- utilizar la clase ConectaBD para conectar la base de datos.
- Realizar la consulta la nota del alumnos por nombre o las notas por asignaturas, según nos pasen por GET alumno o asignatura.
- NO HACER UN FORMULARIO, solo recibir el GET.
- Mostrar los datos en el formato que queráis, sugerencia: incluir en la clase conectaBD un método para mostrar los datos.
*/


    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new PDO("mysql:host=localhost;dbname=dwes2","alumno","1234");
        }
        public static function singleton(){     // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 
        function readAlumnos($opcion) {
            switch ($opcion) {
                case "alumno":
                    $consulta = $this->conexion->prepare("SELECT * FROM alumnos");
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $consulta;
                    break;
                case "asignatura":
                    $consulta = $this->conexion->prepare("SELECT * FROM asignaturas");
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    return $consulta;
                    break;
                default: 
                    echo "Error: " . $opcion . " no encontrado en las BBDD.";
            }
        }

    }

    $conexion     = ConectaBD::singleton();
    
    if ($resultadoCon = $conexion->readAlumnos("asignatura")) { // si no encuentra la asignatura da error
        mostrarResultados($resultadoCon);
    }

    function mostrarResultados($resultadoCon) {
        ?>
        <table style="border: 2px solid black; background-color: #9BBF9D;">
            <tr><td>Resultado de la busqueda</td></tr>
            <?php
            foreach ($resultadoCon as $fila => $contenido) {
                ?>
                <tr  style="border: 1px solid black; background-color: #5EAC63;"><td>
                <?php echo $fila . ": "; print_r($contenido);
                ?>
                </td></tr>
                <?php
            }
        ?>
        </table>
        <?php
    }
?>
</body>
</html>