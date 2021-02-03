<?php
// metodo ons singelton ? que es eso?
//1 Ejecutar sentencias basicas sin contraseña
    // (1) conexion a la BBDD que guardamos en la variable $pdo
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (2) Definir la sentencia SQL
    $consulta = $pdo->query("select * from usuarios");

    // (3) Ejecutar la sentencia SQL
    $consulta->execute();

    // (4) Recuperar información
    $resultado = $consulta->fetchAll();

    // Imprimir en pantalla
    var_dump($resultado);

//2 Ejecutar sentencias basicas pero con parametros

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $consulta = $pdo->prepare("select * from usuarios where estado = :estado");

    // (2) Asignar valores a los parametros. pero:
        // el método bindParam asociamos esta variable 
        // con el parámetro de la sentencia SQL.
    $estado = 'Activo';
    $consulta->bindParam(':estado', $estado);

    // (3) Ejecutar SQL
    $consulta->execute();

    // (4) Recuperar información como en el ejemplo uno pero se guarda en un
        // array asociativo
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir en pantalla
    var_dump($resultado);


//3 Agregar informacion en la BBDD

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $consulta = $pdo->prepare("insert into usuarios (nombre, edad) values(:nombre, :edad)");
    $edad   = '30';
    $nombre = 'marco';
    $consulta->bindParam(':edad', $edad);
    $consulta->bindParam(':nombre', $nombre);

            // otra forma
    $consulta = $pdo->prepare("insert into usuarios (nombre, edad) values(?, ?)");
    $edad   = '30';
    $nombre = 'marco';
    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $edad);

    // Con bindParam() la variable es enlazada como una referencia y sólo será evaluada cuando se llame a execute():
    // Con bindValue() se enlaza el valor de la variable y permanece hasta execute():
    // (3) Ejecutar SQL
    $consulta->execute();



//4 Eliminar informacion en la BBDD

//Cambiar el nombre de la base de datos, usuario y clave
$pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

// (1) Definir SQL
$consulta = $pdo->prepare("delete from usuarios where name = :name");

// (2) Asignar valores a los parametros
$name = "marco";
$consulta->bindParam(':name', $name);

// (3) Ejecutar SQL
$consulta->execute();



// https://diego.com.es/tutorial-de-pdo 
// una segunda pagina una vez se comprenda esto, ya que es mas jodida.




//_________________________________MAS INFO____________________________________________



/*
    La consulta de datos se realiza mediante PDOStatement::fetch, que obtiene la siguiente fila de un conjunto de resultados. Antes de llamar a fetch (o durante) hay que especificar como se quieren devolver los datos:

    PDO::FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
    PDO::FETCH_NUM: devuelve un array indexado cuyos keys son números.
    PDO::FETCH_BOTH: valor por defecto. Devuelve un array indexado cuyos keys son tanto el nombre de las columnas como números.
    PDO::FETCH_BOUND: asigna los valores de las columnas a las variables establecidas con el método PDOStatement::bindColumn.
    PDO::FETCH_CLASS: asigna los valores de las columnas a propiedades de una clase. Creará las propiedades si éstas no existen.
    PDO::FETCH_INTO: actualiza una instancia existente de una clase.
    PDO::FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.
    PDO::FETCH_LAZY: combina PDO::FETCH_BOTH y PDO::FETCH_OBJ, creando los nombres de las propiedades del objeto tal como se accedieron.
    Los más utilizados son FETCH_ASSOC, FETCH_OBJ, FETCH_BOUND y FETCH_CLASS.
*/

/*
    2 ejemplos:

    // FETCH_ASSOC
    $sentencia = $dbh->prepare("SELECT * FROM Clientes");
    // Especificamos el fetch mode antes de llamar a fetch()
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $sentencia->execute();
    // Mostramos los resultados
    while ($row = $sentencia->fetch()){
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    }
    // FETCH_OBJ
    $sentencia = $dbh->prepare("SELECT * FROM Clientes");
    // Ejecutamos
    $sentencia->execute();
    // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while($row = $sentencia->fetch(PDO::FETCH_OBJ)){
        echo "Nombre: " . $row->nombre . "<br>";
        echo "Ciudad: " . $row->ciudad . "<br>";
    }

*/

/*
    Si lo que quieres es llamar al constructor ANTES de que se asignen los datos, se hace lo siguiente:

    $sentencia->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clientes';
    Si en el ejemplo anterior añadimos PDO::FETCH_PROPS_LATE, el nombre y la ciudad se mostrarán como aparecen en la base de datos.
*/


/*
    Finalmente, para la consulta de datos también se puede emplear directamente PDOStatement::fetchAll(), que devuelve un array con todas las filas devueltas por la base de datos con las que poder iterar. También acepta estilos de devolución:

    // fetchAll() con PDO::FETCH_ASSOC
    $sentencia = $dbh->prepare("SELECT * FROM Clientes");
    $sentencia->execute();
    $clientes = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    foreach($clientes as $cliente){
        echo $cliente['nombre'] . "<br>";
    }
    // fetchAll() con PDO::FETCH_OBJ
    $sentencia = $dbh->prepare("SELECT * FROM Clientes");
    $sentencia->execute();
    $clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach ($clientes as $cliente){
        echo $cliente->nombre . "<br>";
    }
*/

            // tabla1
        // nombre      apellido        id
        // juan        jj              43
        
                    // metodos de PDO

        $pdo      = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');
        $añadidos = $pdo->exec("INSERT INTO Clientes values ('Pedro', 30)");//con INSERT devuelve el número de filas afectadas.
        $borrados = $pdo->exec("DELETE FROM Clientes WHERE nombre='Pedro'");//con DELETE devuelve el número de filas afectadas.
        $juanes   = $dbh->exec("SELECT * FROM Clientes WHERE nombre='Pedro'");// con SELECT devuelve 0 porque no ha modificado nada, encuentre o no.
        
        $filasAfectadas = $sentencia->rowCount(); // es como el exec, devuelve numero de filas afectadas
        $ultimoPKcreado = $pdo->lastInsertId(); // Este método devuelve el numero de PK creados.

        $gg = $pdo->prepare("INSERT INTO Clientes values (:nombre,:id) "); // prepare devuelve un objeto tipo sentencia
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