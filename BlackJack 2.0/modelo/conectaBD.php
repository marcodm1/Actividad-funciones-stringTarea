<?php

    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
        }

        public static function singleton(){    
            if (!isset(self::$instancia)) {     
                $miclase = __CLASS__;           
                self::$instancia = new $miclase;
            }
            return self::$instancia; 
        } 

        function verificarUsuario($id, $password) {
            $consulta = $this->conexion->prepare("SELECT * from blackjack where id=:id");
            $consulta->bindParam(":id", $id); 
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultado) == 0) {
                return false; // no hay usuarios registrados con esas caracteristicas
            }
            $passwordHash = $resultado[0]['contrasenia'];
            if (!password_verify($password, $passwordHash)) {
                return false;
            }
            return true;
        }
       
        function registrarUsuario($nombre, $apellido, $edad, $banco, $contraseña) {
            $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
            $pass     = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = $conexion->prepare("insert into blackjack (nombre, apellido, edad, banco, contrasenia)  values (:nombre, :apellido, :edad, banco, :contrasenia)");
            $consulta->bindParam(":nombre"     , $nombre);
            $consulta->bindParam(":apellido"   , $apellido);
            $consulta->bindParam(":edad"       , $edad);
            $consulta->bindParam(":banco"      , $banco);
            $consulta->bindParam(":contrasenia", $pass);
            $consulta->execute();
        }

        function consultarSaldo($id) {
            // $consulta1 = $this->conexion->prepare("SELECT count(*) FROM blackjack WHERE nombre = :nombre1");
            // $consulta1->bindParam(":nombre1", $name); 
            // $consulta1->execute(); // como es count devuelve una tabla con una columna y una fila, con el numero de resultados encontrados
            // $count         = $consulta1->fetchColumn(); // devuelve el 1º resultado de la columna 1ª y si se vuelve a llamar, devuelve el 2º resultado de la misma columna
            // $limitePagina  = 2;
            // $numeroPaginas = ceil($count/$limitePagina); //ceil simplemente redondea hacia arriba el numero de paginas que se van a crear
            // $empiezaEn     = ($pagina - 1) * $limitePagina;
            // podria mostrar las ultimas 10 jugadas..
            // $consulta2 = $this->conexion->prepare("SELECT * FROM blackjack WHERE nombre = :nombre ORDER BY apellido asc limit $empiezaEn, $limitePagina");
            
            $consulta = $this->conexion->prepare("SELECT * FROM blackjack WHERE id = :ud");
            $consulta->bindParam(":id", $id); 
            $consulta->execute();
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // resultados es un array de resultados
            $resultados[0]['banco'];

            return $resultados;

        }

        function actualizarBanco($id, $apuesta) {
            $consulta = $this->conexion->prepare("SELECT * FROM blackjack WHERE nombre = :nombre id = :id");
            $consulta->bindParam(":id", $id); 
            $consulta->execute();
            $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC); // resultados es un array de resultados
            $saldoActual = $resultados[0]['banco'];
            if ($apuesta > 0) {
                $saldoActual += $apuesta;
                ajusteBanco($saldoActual, $id);
            }else {
                $saldoActual -= $apuesta;
                ajusteBanco($saldoActual, $id);
            }      
        }

        function ajusteBanco($saldoActual, $id){
            $consulta = $this->conexion->prepare("UPDATE blackjack set banco=:saldoActual where id=:id ");
            $consulta->bindParam(":saldoActual", $saldoActual);  
            $consulta->bindParam(":id", $id);
            $consulta->execute(); 
        }

        function deleteUsuario($id, $password) {
            if (!$this->comprobarUsuario($id, $password)) {
                return false;
            }

            $consulta = $this->conexion->prepare("DELETE from blackjack where  id=:id");
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            return true;
        }

    }
?>  

