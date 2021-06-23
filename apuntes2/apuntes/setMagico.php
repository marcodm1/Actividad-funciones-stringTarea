<?php

    class Alumno {
        const CENTRO = "Ies Tierno";
        private $identificador;
        private static $contador = 0; // static es que pertenece a la clase
        private $nombre;
        private $apellido;
        private $dni;
        private $fechaNacimiento;

        public function __construct($nombre, $apellido, $dni, $fechaNacimiento) {
            $this->nombre          = $nombre;
            $this->apellido        = $apellido;
            $this->dni             = $dni;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->identificador   = ++ self::$contador;
        }

        public function getEdad() {
            $intervalo = $this->fechaNacimiento->diff(new DateTime()); // diff calcual da diferencia
            return $intervalo->format('%y');
        }

        public function __get($propiedad) { // Ej: 
            if (property_exists(__CLASS__, $propiedad)) {
                return $this->$propiedad;
            }
            return "No existe esa propiedad";
        }

        public function __set($propiedad, $valor) {
            if (property_exists(__CLASS__, $propiedad)) {
                $this->$propiedad = $valor;
            }else {
                $this->$propiedad = $valor;
                echo "Se ha creado una propiedad mas";
            }
        }

        public function __toString() {
            return "Alumno" . $this->nombre . ' ' . $this->apellido;   
        }
    }

    $pepe = New Alumno("Pepe", "Pérez", "54848464", new DateTime("1990-04-19"));
    $pepe->apellido = "Dominguez"; // accedo al set magico y le cambio el valor
    echo "<pre>";
    print_r($pepe);
    echo "Tiene: " . $pepe->getEdad() . " años";
    echo "</pre>";
    

    $pepe2 = New Alumno("Pepe2", "Pérez2", "548484642", new DateTime("1990-04-21"));
    echo "<pre>";
    echo print_r($pepe2);
    echo "</pre>";
?>