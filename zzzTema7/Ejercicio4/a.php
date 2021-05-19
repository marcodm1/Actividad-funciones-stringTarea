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
    Práctica:
    - conectar a dwes2 con PDO.
    - preparar una sentencia consultar la descripción y existencias de los productos cuyas existencias sean más de 200.
    - usar bindValue y bindColumn para asociar las variables a las etiquetas de la sentencia preparada.
    
    - Ejecutar la sentencia.
    - Mostrar los resultados como consideres oportuno.
    - No hacer un formulario.
    - Mostrar mensaje indicando si se ha producido algún error.
    */
    class ConectaBD {
        private $conexion;

        public function __construct($nombreBBDD){
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=$nombreBBDD","alumno","1234");
            }catch(PDOException $error) {
                die ("Error:" . $error->getMessage() . "<br>"); // no se si poner die () en vez de return
            }
        }
        public function __destruct() {
            $this->conexion = null;
        }

        public function verExistencias() {
            try {
                $consulta = $this->conexion->prepare("SELECT descripcion, existencias FROM productos");
                $consulta->execute();
                $consulta->bindColumn(1, $descripcion);
                $consulta->bindColumn(2, $existencias); // no entiendo porque en el debugger aparece un string de un numero pero dentro del while va actuando como un array
                while ($fila = $consulta->fetch(PDO::FETCH_BOUND)) { // y si saco esto fuera, como podria trabajar con ello?
                    $datos = "Descripcion: " . $descripcion . " y las existencias: " . $existencias;

                    echo $datos . "<br>";
                }
            }catch(PDOException $error) {
                return "Error: Se ha producido un error al consultar en la BBDD " . $error->getMessage() . "<br>"; // no se si poner die () en vez de return
            }
        }
    }
    
    $conexion = new ConectaBD("dwes2");
    $conexion->verExistencias();

    ?> 
</body>
</html>
