<?php
    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=dwes_extra","user","1234"); // poner el usuario con permisos
                $this->conexion->exec("set names utf8");  
            }catch(Exception $error) {
                die("Error:" . $error->getMessage());
                echo "Línea del error " . $error->getLine();
            }
        }
        public static function singleton(){ 
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 
        public function mostrarPacientes() {
            $consulta = $this->conexion->prepare("SELECT nombre from paciente");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }
        public function mostrar1Paciente($nombre) {
            $consulta = $this->conexion->prepare("SELECT dni from paciente WHERE nombre = ?");
            $consulta->bindParam(1, $nombre);
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }
        public function mostrarCodigos() {
            $consulta = $this->conexion->prepare("SELECT codigo from colegiado");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }
        public function colegiadosActivos() {
            $consulta = $this->conexion->prepare("SELECT activo from colegiado WHERE activo == 0");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }

        public function darAlta($codigo_colegiado, $dni_paciente, $fecha_operacion, $codigo_sala, $turno) {
            $consulta = $this->conexion->prepare("INSERT into operacion (identificador, codigo_colegiado, dni_paciente, fecha_operacion, codigo_sala, turno) values(?, ?, ?, ?, ?, ?)");
            $consulta->bindParam(1, $login, PDO::PARAM_STR);
            $consulta->bindParam(2, $codigo_colegiado, PDO::PARAM_INT);
            $consulta->bindParam(3, $dni_paciente, PDO::PARAM_STR);
            $consulta->bindParam(4, $fecha_operacion, PDO::PARAM_STR);
            $consulta->bindParam(5, $codigo_sala, PDO::PARAM_INT);
            $consulta->bindParam(6, $turno);
            try {
                $consulta->execute();
                return true;
            } catch (PDOException $error){
                return false;
            }
        }

        public function mostrarSalas() {
            $consulta = $this->conexion->prepare("SELECT codigo from sala");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }

        public function mostrarColegiados() {
            $consulta = $this->conexion->prepare("SELECT codigo from colegiado");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }

        public function comprobarClave($clave) { // siempre acepta aunque la pass sea incorrecta
            $consulta = $this->conexion->prepare("SELECT clave from administrador");
            $consulta->bindParam(1, $clave);
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($consulta as $poss => $valor) {
                    foreach ($valor as $clavee) {
                        $hash = $clavee;
                    }
                }
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
            
            if (password_verify($clave, $hash)) {
                return true;
            }else {
                return false;
            }

            



        }
    }
?>  

