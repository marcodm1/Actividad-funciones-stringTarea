<?PHP
    class Alergeno { // ok
        private $alergeno; // string
        private $colorR;   // int
        private $colorG;   // int
        private $colorB;   // int

        public function __construct($alergeno, $colorR, $colorG, $colorB) { // colores entre 0 y 255 ok
            $this->alergeno = $alergeno;                                    
            $this->colorR   = $colorR;
            $this->colorG   = $colorG;
            $this->colorB   = $colorB;
        }
        public function getColor($rojo, $verde, $azul){ // ok
            $arrayColores = array();
            $arrayColores[$rojo]  = $this->colorR;
            $arrayColores[$verde] = $this->colorG;
            $arrayColores[$azul]  = $this->colorB; 
            return $arrayColores;
        }
    }

    class Ingrediente {
        const ANIMAL       = 1;
        const VEGETAL      = 2;
        const LACTEO       = 3;
        const SINCALIFICAR = 4;

        private $nombre;   //nombre del ingrediente
        private $calorias; //calorías cada 100 gramos.
        private $precio;   //precio por 100 gramos.
        private $tipo;     //tipo animal, vegetal, lácteo o sin calificar. Utilizar las constantes para
        private $alergeno; //alérgeno que contiene, puede estar vacío si no tienen ninguno
    
        public function __construct($nombre, $calorias, $precio, $tipo, $alergeno) {
            $this->nombre   = $nombre;
            $this->calorias = $calorias;
            $this->precio   = $precio;
            $this->tipo     = $tipo;
            $this->alergeno = $alergeno; // será opcional, si no tiene alérgenos será null solo puede tener uno.
        }
        public function __getM(){ 
            
        }
    }

    class Plato /* añado extends Ingrediente? */{ 
        private $nombre;
        private $ingredientes_cantidad = array(); //array de arrays con los ingredientes del plato y sus cantidades
    
        public function __construct($nombre) { 
            $this->nombre   = $nombre;    
        }
        public function add($ingrediente, $cantidad) {
            $this->ingredientes_cantidad[$ingrediente->nombre] = $ingrediente->cantidad;

        }
        public function getAlergenos(){ // ok
            $arrayAlergenos = array();
            foreach ($this->ingredientes_cantidad as $clave => $valor){
                if(is_array($valor) == true) { 
                    foreach ($valor as $ingrediente) {
                        if ($ingrediente->alergeno == true) {
                            $arrayAlergenos[] = $ingrediente->nombre;
                        }
                    }
                }
            } 
            if (count($arrayAlergenos) > 0 ) {
                return true;
            }else {
                return false;
            }
        }
        public function precio(){ // ok
            $precio = 0;
            $precioIngredientes = array();
            $precioPlato;
            foreach ($this->ingredientes_cantidad as $clave => $valor){
                if(is_array($valor) == true) { 
                    foreach ($valor as $ingrediente) {
                        $cantidad = 0;
                        $precio   = 0;
                        if($valor == $this->valor->cantidad) {
                            $cantidad = $this->valor->cantidad;
                        }
                        if($valor == $this->valor->precio) {
                            $precio = $this->valor->precio;
                        }
                        $precioIngreciente    = $precio * ($cantidad/100);
                        $precioIngredientes[] = $precioIngreciente;
                    }
                }
            } 
            foreach ($precioIngredientes as $cantidad) {
                $precioPlato = $precioPlato + $cantidad;
            }
            return $precioPlato;
        } 
        public function calorias(){ // ok
            $calorias = 0;
            $caloriasIngredientes = array();
            $caloriasPlato;
            foreach ($this->ingredientes_cantidad as $clave => $valor){
                if(is_array($valor) == true) { 
                    foreach ($valor as $ingrediente) {
                        $cantidad = 0;
                        $calorias   = 0;
                        if ($valor == $this->valor->cantidad) {
                            $cantidad = $this->valor->cantidad;
                        }
                        if ($valor == $this->valor->calorias) {
                            $calorias = $this->valor->calorias;
                        }
                        $caloriasIngreciente    = $calorias * ($cantidad/100);
                        $caloriasIngredientes[] = $caloriasIngreciente;
                    }
                }
            } 
            foreach ($caloriasIngredientes as $cantidad) {
                $caloriasPlato = $caloriasPlato + $cantidad;
            }
            return $caloriasPlato;
        }
        public function muestraPlato(){
            foreach ($this->ingredientes_cantidad as $clave => $valor){
                if(is_array($valor) == true) { 
                    foreach ($valor as $ingrediente) {
                        if ($this->valor->alergeno == true) {
                            echo "<ol style='background-color: red;' >" . $valor . "</ol>";
                        }
                        if ($valor == $this->valor->nombre) {
                            echo "<ol>" . $valor . "</ol>";
                        }
                        if ($valor == $this->valor->cantidad) {
                            echo "<ol>" . $valor . "</ol>";
                        }
                    }
                }
            }
        }
    }


    class PlatoPreparado extends Plato { // ok
        private $fecha_elaboracion = date("d-m-Y"); 
        private $diasComestible    = 4;
        
        public function __construct($fecha_elaboracion, $diasComestible, $nombre, $ingredientes_cantidad, ) { 
            
            $this->fecha_elaboracion  = $fecha_elaboracion;
            if ($diasComestible == null) {
                $diasComestible = $this->diasComestible;
            }else {
                $this->diasComestible = $diasComestible;
            }
            parent::__construct($nombre, $ingredientes_cantidad);
            $this->nombre = $nombre;   
            $this->ingredientes_cantidad = $ingredientes_cantidad; 
        }
    }

    public function getFechaCaducidad () { // ok
        $fechaActual = $this->fecha_elaboracion;
        $comestible  = $this->diasComestible;
        $fechaReal =  date("d-m-Y",strtotime($fechaActual .  $comestible . " day"));
        return $fechaReal;
    }

    public function muestraPlato() { // que muestra el plato igual que en la clase Plato, pero además
                                            // indica la fecha de caducidad, en formato día /mes/ año.
        
    }

?>