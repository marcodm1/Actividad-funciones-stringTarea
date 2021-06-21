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

        public function __construct($nombreBBDD){
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=$nombreBBDD","alumno","1234");
            }catch(PDOException $error) {
                return "Error:" . $error->getMessage() . "<br>"; 
            }
        }
        public function __destruct() {
            $this->conexion = null;
        }

        // public function muestraTabla($array) {
        //     echo '<table>';
        //     echo '<tr>';
        //     foreach($array as $valor) {
        //             echo'<td>'. "Descripcion: " . $valor . '</td>';
        //     }
        //     echo '</tr>';
        //     echo '</table>';
        // }

        public function verExistencias() {
            try {
                $consulta = $this->conexion->prepare("SELECT descripcion, existencias FROM productos where existencias > 200");
                $consulta->execute();
                $consulta->bindColumn(1, $descripcion);
                $consulta->bindColumn(2, $existencias);
                echo "<table>";
                echo "<tr>";
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) { // y si saco esto fuera, como podria trabajar con ello?
                    foreach ($fila as $valor) {
                        echo "<td>" . $valor . "</td>";
                    }
                    echo "</tr>";
                }

                // $this->muestraTabla($fila = $consulta->fetch(PDO::FETCH_ASSOC));
            }catch(PDOException $error) {
                return "Error: Se ha producido un error al consultar en la BBDD " . $error->getMessage() . "<br>"; // no se si poner die () en vez de return
            }
        }
    }
    
    $conexion  = new ConectaBD("dwes2");
    $resultado = $conexion->verExistencias();
    ?> 
</body>
</html>
