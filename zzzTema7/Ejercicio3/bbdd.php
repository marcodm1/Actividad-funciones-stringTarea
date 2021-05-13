<?php

    class Bbdd {
        private $conexion;

        public function modificaUsuarios($login, $clave) {
            //modifica el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        }

        public function altaUsuarios($login, $clave) {
            //da de alta el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        }

        public function muestraTabla($array) {
            //recibe el array del fetch_all y muestra las filas en formato de tabla.
        }

        public function consultaUsuarios() {
            //devuelve un array con todos los usuarios, utilizar fetch_all

        }

        public function conecta($host, $usuario, $password, $bbdd) {
            //realiza la conexión con la base de datos y establece el juego de caracteres.
            $conexion = new mysqli("$host", "$usuario", "$password","$bbdd"); 
            if ($conexion->connect_errno) { 
                echo "Fallo al conectar a MySQL: " . $conexion->connect_error ;
            }
            if (!$conexion->set_charset("utf8")) { 
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
            }
        }

        public function close() {
            //cierra la conexión.
        }

    }

    


        $consulta = "Select * from usuarios;"; 
        if (mysqli_query($conexion , $consulta)) {
            $resultadoConsulta = mysqli_query($conexion , $consulta); 
        }else {
            echo "Error al intentar conectarse con la base de datos:";
        }

        $totalResultados = mysqli_num_rows($resultadoConsulta); 

        // Transfiere un conjunto de resultados de la última consulta
        // store_result();

        // Ajustar el puntero de resultado a una fila concreta
        $resultadoConsulta->data_seek($totalResultados -1);

        // obtenemos la fila
        $fila = $resultadoConsulta->fetch_row();

        // mostramos la fila
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
        $conexion->close();
?>