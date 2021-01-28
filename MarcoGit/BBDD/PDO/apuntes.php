<?php
// metodo ons singelton ? que es eso?
//1 Ejecutar sentencias basicas sin contraseña
    // (1) conexion a la BBDD que guardamos en la variable $pdo
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (2) Definir la sentencia SQL
    $comando = $pdo->query("select * from usuarios");

    // (3) Ejecutar la sentencia SQL
    $comando->execute();

    // (4) Recuperar información
    $resultado = $comando->fetchAll();

    // Imprimir en pantalla
    var_dump($resultado);

//2 Ejecutar sentencias basicas pero con parametros

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $comando = $pdo->prepare("select * from usuarios where estado = :estado");

    // (2) Asignar valores a los parametros. pero:
        // el método bindParam asociamos esta variable 
        // con el parámetro de la sentencia SQL.
    $estado = 'Activo';
    $comando->bindParam(':estado', $estado);

    // (3) Ejecutar SQL
    $comando->execute();

    // (4) Recuperar información como en el ejemplo uno pero se guarda en un
        // array asociativo
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir en pantalla
    var_dump($resultado);


//3 Agregar informacion en la BBDD

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $comando = $pdo->prepare("insert into usuarios (nombre, edad) values(:nombre, :edad)");
    $edad   = '30';
    $nombre = 'marco';
    $comando->bindParam(':edad', $edad);
    $comando->bindParam(':nombre', $nombre);

            // otra forma
    $comando = $pdo->prepare("insert into usuarios (nombre, edad) values(?, ?)");
    $edad   = '30';
    $nombre = 'marco';
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $edad);

    // Con bindParam() la variable es enlazada como una referencia y sólo será evaluada cuando se llame a execute():
    // Con bindValue() se enlaza el valor de la variable y permanece hasta execute():
    // (3) Ejecutar SQL
    $comando->execute();



//4 Eliminar informacion en la BBDD

//Cambiar el nombre de la base de datos, usuario y clave
$pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

// (1) Definir SQL
$comando = $pdo->prepare("delete from usuarios where name = :name");

// (2) Asignar valores a los parametros
$name = "marco";
$comando->bindParam(':name', $name);

// (3) Ejecutar SQL
$comando->execute();



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
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();
    // Mostramos los resultados
    while ($row = $stmt->fetch()){
        echo "Nombre: {$row["nombre"]} <br>";
        echo "Ciudad: {$row["ciudad"]} <br><br>";
    }
    // FETCH_OBJ
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    // Ejecutamos
    $stmt->execute();
    // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        echo "Nombre: " . $row->nombre . "<br>";
        echo "Ciudad: " . $row->ciudad . "<br>";
    }

*/

/*
    Si lo que quieres es llamar al constructor ANTES de que se asignen los datos, se hace lo siguiente:

    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Clientes';
    Si en el ejemplo anterior añadimos PDO::FETCH_PROPS_LATE, el nombre y la ciudad se mostrarán como aparecen en la base de datos.
*/


/*
    Finalmente, para la consulta de datos también se puede emplear directamente PDOStatement::fetchAll(), que devuelve un array con todas las filas devueltas por la base de datos con las que poder iterar. También acepta estilos de devolución:

    // fetchAll() con PDO::FETCH_ASSOC
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($clientes as $cliente){
        echo $cliente['nombre'] . "<br>";
    }
    // fetchAll() con PDO::FETCH_OBJ
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($clientes as $cliente){
        echo $cliente->nombre . "<br>";
    }
*/

/*
    Existen otras funciones en PDO que pueden ser de utilidad:

    PDO::exec(). Ejecuta una sentencia SQL y devuelve el número de filas afectadas. Devuelve el número de filas modificadas o borradas, no devuelve resultados de una secuencia SELECT:
        // Si lo siguiente devuelve 1, es que se ha eliminado correctamente:
        echo $dbh->exec("DELETE FROM Clientes WHERE nombre='Luis'");
        // No devuelve el número de filas con SELECT, devuelve 0
        echo $dbh->exec("SELECT * FROM Clientes");
    PDO::lastInsertId(). Este método devuelve el id autoincrementado del último registro en esa conexión:
        $stmt = $dbh->prepare("INSERT INTO Clientes (nombre) VALUES (:nombre)");
        $nombre = "Angelina";
        $stmt->bindValue(':nombre', $nombre);
        $stmt->execute();
        echo $dbh->lastInsertId();
    PDOStatement::fetchColumn(). Devuelve una única columna de la siguiente fila de un conjunto de resultados. La columna se indica con un integer, empezando desde cero. Si no se proporciona valor, obtiene la primera columna.
        $stmt = $dbh->prepare("SELECT * FROM Clientes");
        $stmt->execute();
        while ($row = $stmt->fetchColumn(1)){
            echo "Ciudad: $row <br>";
        }
    PDOStatement::rowCount(). Devuelve el número de filas afectadas por la última sentencia SQL:
        $stmt = $dbh->prepare("SELECT * FROM Clientes");
        $stmt->execute();
        echo $stmt->rowCount();
*/


/*
    Si los datos necesitan una transformación antes de que salgan de la base de datos, se puede hacer automáticamente cada vez que se crea un objeto:

    class Clientes
    {
        public $nombre;
        public $ciudad;
        public $otros;
        public function __construct($otros = ''){
            $this->nombre = strtoupper($this->nombre);
            $this->ciudad = mb_substr($this->ciudad, 0, 3);
            $this->otros = $otros;
        }
        // ....Código de la clase....
    }
    $stmt = $dbh->prepare("SELECT * FROM Clientes");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Clientes');
    $stmt->execute();
    while ($objeto = $stmt->fetch()){
        echo $objeto->nombre . " -> ";
        echo $objeto->ciudad . "<br>";
    }

*/




?>