<?php
    class ConectaBD {
        private $conexion;
        // php puede poner un constructor automatico
        public function __construct() {
                $this->conexion = new mysqli("localhost", "root", "","dwes2"); 
                if ($this->conexion->connect_errno) {
                    return "Fallo en conexión: ". $this->conexion->connect_error;
                }
                if ($this->conexion->set_charset("utf8")) {
                    return "Error al cargar utf8";
                }
        }
        public function createP($login, $clave) {
            $consulta='INSERT INTO usuarios(login, clave) values(?, ?)';
            if (!$resultado = $this->conexion->prepare($consulta)) {
                return "Error al cargar los usuarios";
            }
            $resultado->bind_param('ss',$login,$clave); 
            $resultado->execute();
            if ($resultado->affected_rows > 0) {
                return 'se ha insertado correctamente el usuario';
            }
        }
        public function readP() { // dudas de este
            //devuelve un array con todos los usuarios, utilizar fetch_all
            $consulta   = "SELECT * FROM usuarios";
            if (!$resultado  = $this->conexion->query($consulta) ) {
                return "Error al cargar los usuarios";
            }
            $resultado  =  $resultado->fetch_all();
            return $resultado;
        }
        public function updateP($login, $clave) {
            $consulta='UPDATE usuarios SET clave=? WHERE login=?';
            if (!$resultado = $this->conexion->prepare($consulta)) {
                echo 'Error en la consulta, '.$this->con->error;
            }
            $resultado->bind_param('ss',$clave,$login);
            $resultado->execute();
            if ($resultado->affected_rows > 0) {
                echo 'se ha modificado correctamente el usuario';
            }
        }
        public function deleteP($login) { 
            $consulta = "DELETE from usuarios WHERE login = ?";
            if (!$resultado = $this->conexion->prepare($consulta)) {
                echo 'Error en la consulta, '.$this->con->error;
            }
            $resultado->bind_param('s', $login);
            try {
                $resultado->execute(); 
                return "Eliminado correctamente";
            } catch (PDOException $error){
                return "Error: El usuario no tiene los permisos necesarios para eliminar.";
            }
        }
        public function close() {
            $this->conexion->close();
        }




        public function muestraTabla($array) {
            /* print_r($array);
            echo '<br>'; */ 
            echo '<table>';
            foreach($array as $valor) {
                echo '<tr>';
                foreach($valor as $x) {
                    echo'<td>'.$x.'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    }
?>

Pasos: 

- Conectar con la base de datos //mysqli::connect

- Establecer el juego de caracteres //mysqli::set_charset

- Realizar la consulta //mysqli::real_query

- Obtener los datos de la consulta //mysqli::store_result

- Obtener el número de filas consultadas //mysqli_result::num_rows

- Colocar el cursor en la posición adecuada /mysqli_result::data_seek

- Obtener los datos //mysqli_result::fetch_assoc

- Mostrar los datos.

- Liberar espacio //mysqli_result::free o mysqli_result::free_result

- Cerrar la conexión //mysqli::close

