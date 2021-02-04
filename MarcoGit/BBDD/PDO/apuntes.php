<?php
    La consulta de datos se realiza mediante PDOStatement::fetch, que obtiene la siguiente fila de un conjunto de resultados. Antes de llamar a fetch (o durante) hay que especificar como se quieren devolver los datos:

    $pd->FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
    $pd->FETCH_NUM: devuelve un array indexado cuyos keys son números.
    $pd->FETCH_BOTH: valor por defecto. Devuelve un array indexado cuyos keys son tanto el nombre de las columnas como números.
    $pd->FETCH_BOUND: asigna los valores de las columnas a las variables establecidas con el método PDOStatement::bindColumn.
    $pd->FETCH_CLASS: asigna los valores de las columnas a propiedades de una clase. Creará las propiedades si éstas no existen.
    $pd->FETCH_INTO: actualiza una instancia existente de una clase.
    $pd->FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.
    $pd->FETCH_LAZY: combina $pd->FETCH_BOTH y $pd->FETCH_OBJ, creando los nombres de las propiedades del objeto tal como se accedieron.
    Los más utilizados son FETCH_ASSOC, FETCH_OBJ, FETCH_BOUND y FETCH_CLASS.


    2 ejemplos:

    // FETCH_ASSOC
    $sentencia = $dbh->prepare("SELECT * FROM personas");
    // Especificamos el fetch mode antes de llamar a fetch()
    $sentencia->setFetchMode($pd->FETCH_ASSOC);
    // Ejecutamos
    $sentencia->execute();
    // Mostramos los resultados
    while ($row = $sentencia->fetch()){
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    }
    // FETCH_OBJ
    $sentencia = $dbh->prepare("SELECT * FROM personas");
    // Ejecutamos
    $sentencia->execute();
    // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while($row = $sentencia->fetch($pd->FETCH_OBJ)){
        echo "Nombre: " . $row->nombre . "<br>";
        echo "Ciudad: " . $row->ciudad . "<br>";
    }




    Si lo que quieres es llamar al constructor ANTES de que se asignen los datos, se hace lo siguiente:

    $sentencia->setFetchMode($pd->FETCH_CLASS | $pd->FETCH_PROPS_LATE, 'personas';
    Si en el ejemplo anterior añadimos $pd->FETCH_PROPS_LATE, el nombre y la ciudad se mostrarán como aparecen en la base de datos.

// Imprimir en pantalla
var_dump($resultado);


    Finalmente, para la consulta de datos también se puede emplear directamente PDOStatement::fetchAll(), que devuelve un array con todas las filas devueltas por la base de datos con las que poder iterar. También acepta estilos de devolución:

    // fetchAll() con $pd->FETCH_ASSOC
    $sentencia = $dbh->prepare("SELECT * FROM personas");
    $sentencia->execute();
    $personas = $sentencia->fetchAll($pd->FETCH_ASSOC);
    foreach($personas as $cliente){
        echo $cliente['nombre'] . "<br>";
    }
    // fetchAll() con $pd->FETCH_OBJ
    $sentencia = $dbh->prepare("SELECT * FROM personas");
    $sentencia->execute();
    $personas = $sentencia->fetchAll($pd->FETCH_OBJ);
    foreach ($personas as $cliente){
        echo $cliente->nombre . "<br>";
    }










//---------------------------------------------------------------

            // tabla1
        // nombre      apellido        id
        // juan        jj              43
        
                    // metodos de PDO

        $pdo      = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');
        $añadidos = $pdo->exec("INSERT INTO personas values ('Pedro', 30)");//con INSERT devuelve el número de filas afectadas.
        $borrados = $pdo->exec("DELETE FROM personas WHERE nombre='Pedro'");//con DELETE devuelve el número de filas afectadas.
        $juanes   = $dbh->exec("SELECT * FROM personas WHERE nombre='Pedro'");// con SELECT devuelve 0 porque no ha modificado nada, encuentre o no.
        
        $filasAfectadas = $sentencia->rowCount(); // es como el exec, devuelve numero de filas afectadas
        $ultimoPKcreado = $pdo->lastInsertId(); // Este método devuelve el numero de PK creados.

        $gg = $pdo->prepare("INSERT INTO personas values (:nombre,:id) "); // prepare devuelve un objeto tipo sentencia
        $gg->bindParam(":nombre", "Juan"); // que es lo mismo que el bind_param pero sin _ y sin el "si" inicial
        $gg->bindParam(":id", 20);
        $gg->execute();

        $datoX = $gg->fetchColumn(1); // devuelve el dato de la columna elegida, en este caso 1, devolveria el apellido

   

    class Dao {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new mysqli("localhost", "root", "", "dwes");
        }

        public static function singleton(){ 
            if (!isset(self::$instancia)) { // se usa :: porque es static
                $miclase = __CLASS__;// __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }

        public function setConexion($conn){
            $this->conexion = $conn;
        }

        public function comprobarConexion() {
            if ($this->conexion->connect_errno) {
                echo "Ha habido un error";
            }else {
                echo "Conexion ok!";
            }
        }
        
        public function __clone() { 
            trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
        }

        function actualizarContraseña($usuario, $contraseñaActual, $nuevaContraseña) {
            $consulta = $this->conexion->prepare("update personas set contraseña=? where nombre=? and contraseña=?");
            $consulta->bind_param("iss", $nuevaContraseña , $usuario, $contraseñaActual );
            $consulta->execute();
        }
    }

    // main
    $connn = new mysqli("localhost", "root", "", "dwes");
    $a = Dao::singleton();
    $a->setConexion($connn);
    $a->comprobarConexion();
    $a->actualizarContraseña($usuario, $contraseñaActual, $nuevaContraseña);


?>