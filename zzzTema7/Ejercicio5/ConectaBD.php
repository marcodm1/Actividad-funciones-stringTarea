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
        function verNota($IDasignatura, $IDAlumno) {
            try {
                $consulta = $this->conexion->prepare("SELECT nota FROM notas where idAlumno = ? and  idAsignatura = ?");
                $consulta->bindParam(1, $IDAlumno);
                $consulta->bindParam(2, $IDasignatura);
                try {
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($consulta as $valor) {
                        $consulta = $valor;
                        foreach ($consulta as $c) {
                            $consulta = $c;
                        }
                    }
                    return $consulta;
                } catch (PDOException $error){
                    return "Error: uno de los dos datos introducidos no son correctos";
                }
            }catch(PDOException $error) {
                echo "Error: no encontrado en la BBDD.";
            }  
        }
        function verIDalumno($nombre) {
            try {
                $consulta = $this->conexion->prepare("SELECT idAlumno FROM alumnos where nombre = ?");
                $consulta->bindParam(1, $nombre);
                try {
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($consulta as $valor) {
                        $consulta = $valor;
                        foreach ($consulta as $c) {
                            $consulta = $c;
                        }
                    }
                    return $consulta;
                } catch (PDOException $error){
                    return "Error: uno de los dos datos introducidos no son correctos";
                }
            }catch(PDOException $error) {
                echo "Error: no encontrado en la BBDD.";
            }  
        }
        function verIDasignatura($asignatura) {
            try {
                $consulta = $this->conexion->prepare("SELECT idAsignatura FROM asignaturas where nombre = ?");
                $consulta->bindParam(1, $asignatura);
                try {
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($consulta as $valor) {
                        $consulta = $valor;
                        foreach ($consulta as $c) {
                            $consulta = $c;
                        }
                    }
                    return $consulta;
                } catch (PDOException $error){
                    return "Error: uno de los dos datos introducidos no son correctos";
                }
            }catch(PDOException $error) {
                echo "Error: no encontrado en la BBDD.";
            }  
        }

        function mostrarResultados($resultadoCon) {
            ?>
            <table style="border: 2px solid black; background-color: #9BBF9D;">
                <tr><td colspan="4">Resultado de la busqueda</td></tr>
                <?php
                foreach ($resultadoCon as $contenido) {
                    ?>
                    <tr style="border: 1px solid black; background-color: #5EAC63;">
                    <?php
                    foreach ($contenido as $valor) {
                        echo "<td>" . $valor . "</td>";
                    }
                    ?></tr>
                    <?php
                }
            ?>
            </table>
            <?php
        }
    }

    if (empty($_GET['asignatura']) || empty($_GET['nombre'])) {
        $asignatura = "DWES";
        $asignatura = serialize($asignatura);
		$asignatura = urlencode($asignatura);

        $nombre = "PEPE";
        $nombre = serialize($nombre);
		$nombre = urlencode($nombre);
		header("Location: ConectaBD.php?asignatura=" . $asignatura . "&nombre=" . $nombre);

    }else {
        $asignatura = unserialize($_GET['asignatura']);
        $nombre     = unserialize($_GET['nombre']);
        echo "Asignatura seleccionada: " . $asignatura . "<br>";
        echo "Nombre seleccionado: "     . $nombre . "<br>";

        $conexion     = ConectaBD::singleton();
        $idAlumno     = $conexion->verIDalumno($nombre);
        $idAsignatura = $conexion->verIDasignatura($asignatura);
        echo $conexion->verNota($idAlumno, $idAsignatura);
        }

        
      

?>
</body>
</html>