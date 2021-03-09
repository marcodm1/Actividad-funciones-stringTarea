<?PHP
    class Alergeno {
        private $alergeno;
        private $colorR;   
        private $colorG;   
        private $colorB;   

        public function __construct($alergeno, $colorR, $colorG, $colorB) { // colores entre 0 y 255 ok
            $this->alergeno = $alergeno;                                    
            $this->colorR   = $colorR;
            $this->colorG   = $colorG;
            $this->colorB   = $colorB;
        }
        public function getColor(&$rojo, &$verde, &$azul){ // por referencia
            $rojo  = $this->colorR;
            $verde = $this->colorG;
            $azul  = $this->colorB;
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
    
        public function __construct($nombre, $calorias, $precio, $tipo, $alergeno = null) { // por defecto tendra el valor null
            $this->nombre = $nombre;
            if (strlen($nombre) > 10) { // compruebo que el tamaño no sea x
                throw new Exception ("Error");
            }
            $this->calorias = $calorias;
            $this->precio   = $precio;
            $this->tipo     = $tipo;
            $this->alergeno = $alergeno;
        }
        public function get($nombre){ 
            
        }
    }

    class Plato { 
        private $nombre;
        private $ingredientes_cantidad; 
    
        public function __construct($nombre) { 
            $this->nombre   = $nombre;    
        }
        public function add($ingrediente, $cantidad) {
            $array1 = array($ingrediente, $cantidad);
            $this->ingredientes_cantidad[] = $array1;
        }
        public function getAlergenos(){
            $arrayAlergenos = array();
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                if ($array[0]->alergeno == true) {
                    $arrayAlergenos[] = $array[0]->nombre;
                }
            } 
            return $arrayAlergenos;
        }
        public function precio(){
            $precioPlato = 0;
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                $cantidad          += $array[1];
                $precio            = $array[0]->precio; // precio/100
                $precioIngrediente = ($precio*$cantidad)/100;
                $precioPlato       += $precioIngrediente;
            } 
            return $precioPlato;
        } 

        public function calorias(){
            $caloriasPlato = 0;
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                $calorias            = $array[0]->calorias; // calorias/100
                $caloriasIngrediente = ($calorias*$cantidad)/100;
                $caloriasPlato       += $caloriasIngrediente;
            } 
            return $caloriasPlato;
        }

        public function muestraPlato(){
            echo "<ol>";
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                if ($array[0]->alergeno == true) {
                    $alergeno = $array[0]->alergeno;
                    $rojo  = $alergeno->colorR;
                    $verde = $alergeno->colorG;
                    $azul  = $alergeno->colorB;
                    echo "<li background-color: rgb($rojo, $verde, $azul)>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
                }else {

                }
                echo "<li>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
            }
            echo "</ol>";
        }
    }


    class PlatoPreparado extends Plato {
        private $fecha_elaboracion = date("d-m-Y"); 
        private $diasComestible    = 4;
        
        public function __construct($fecha_elaboracion, $diasComestible, $nombre, $ingredientes_cantidad) { 
            
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
    

        public function getFechaCaducidad () {
            $fechaActual = $this->fecha_elaboracion;
            $comestible  = $this->diasComestible;
            $fechaReal =  date("d-m-Y",strtotime($fechaActual .  $comestible . " day"));
            return $fechaReal;
        }

        public function muestraPlato() { // que muestra el plato igual que en la clase Plato, pero además
                                                // indica la fecha de caducidad, en formato día /mes/ año.
            
        }
}
?>