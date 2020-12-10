<?php
    class Datos {
        private $color;
        public function __set($propiedad, $valor){
            $this->$propiedad = $valor;
        }
        public function __get($propiedad){
            if (property_exists($this, $propiedad)){
                return $this->$propiedad;
            }
        }
    }

    $datos = new Datos;
    $datos->noexisto = "Ahora si existo";
    $datos->color = "verde";
    echo "<pre>";
    print_r($datos);
    echo "<pre>";

?>

<?php
    class Datos {
        protected $datos = array();

        public function __set($nombre, $valor){
            $this->$datos[$nombre] = $valor;
        }
        public function __get($nombre){
            return $this->datos[$nombre];
        }
    }

    $datos = new Datos;
    
    // faltan cosas
    echo $datos->primero . "<br>";
    echo $datos->segundo . "<br>";
    echo $datos->tercero . "<br>";


?>