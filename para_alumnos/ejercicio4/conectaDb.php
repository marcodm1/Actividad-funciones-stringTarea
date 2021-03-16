<?php
    class ConectaDb {
        private static $instancia;
        private $conexion;
        private $servidor   = 'localhost';
        private $dbname     = 'db';
        private $usuario    = 'alumno';
        private $password   = '1234';
        
        private function __construct() {
            $conexion = new PDO("mysql:host=$servidor;dbname=$dbname", $usuario, $password);
        }
        public static function getInstance() {
            if (!isset(self::$instancia)) {
                self::$instancia = new self();
            }
            return self::$instancia;
        }
        public function verificarUsuario($user, $password) { // como en el CRUD 
            $contraseñaHasheada = password_hash($password, PASSWORD_DEFAULT);

            $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=:user and password=:password");
            $consulta->bindParam(":user",       $user);
            $consulta->bindParam(":password",   $contraseñaHasheada);
            $consulta->execute();
            $result = $consulta->fetch(PDO::FETCH_OBJ);
            return isset($result);
        }
        public function obtenerClientes() {
            $consulta = $conexion->prepare("SELECT * FROM clientes");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }
        public function reactivar($id, $usuario, $password) { // para reactivar
            if (verificarUsuario($usuario, $password)) {
                $consulta = $conexion->prepare("UPDATE clientes SET fecha_alta=:alta, fechaBaja=null WHERE id=:id");
                $consulta->bindParam(":alta", date("Y-m-d H:i:s"));
                $consulta->bindParam(":id"  , $id);
                registrarAuditoria($usuario, "ALTA", $id);
                $consulta->execute();
            }
        }
        public function baja($id, $usuario, $password) {
            if (verificarUsuario($usuario, $password)){
                $consulta = $conexion->prepare("UPDATE clientes SET fechaBaja=:baja WHERE id=:id");
                $consulta->bindParam(":baja", date("Y-m-d H:i:s"));
                $consulta->bindParam(":id"  , $id);
                registrarAuditoria($usuario, "BAJA", $id);
                $consulta->execute();
            }
        }
        private function registrarAuditoria($usuario, $accion, $cliente) {
            $consulta = $conexion->prepare("INSERT INTO auditorias (usuario, fecha, hora, accion, clienteModificado) VALUES (:usuario, CURDATE(), CURTIME(), :accion, :clienteModificado)");
            $consulta->bindParam(":usuario"          , $usuario);
            $consulta->bindParam(":accion"           , $accion);
            $consulta->bindParam(":clienteModificado", $cliente);
            $consulta->execute();
        }
    }
?>