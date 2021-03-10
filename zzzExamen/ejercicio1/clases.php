<?PHP
    require_once("interfaz.php");

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

        public $nombre;   //nombre del ingrediente
        public $calorias; //calorías cada 100 gramos.
        public $precio;   //precio por 100 gramos.
        public $tipo;     //tipo animal, vegetal, lácteo o sin calificar. Utilizar las constantes para
        public $alergeno; //alérgeno que contiene, puede estar vacío si no tienen ninguno
    
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
        public function __get($hh){ // si llaman a una propiedad que no existe, entra al __getter magioco                                                                   
            return "No existe esa propiedad";
        }

        public function getNombre(){ // si llaman a una propiedad private, se suele usar get                                                                   
            return $this->nombre;
        }

        public function setNombre($nombre){ // para modificar a una propiedad private, se suele usar set                                                                     
            $this->nombre = $nombre; 
        }

    }

    class Plato implements Complementos {
        public $nombre;
        public $ingredientes_cantidad; 
    
        public function __construct($nombre) { 
            $this->nombre                = $nombre; 
            $this->ingredientes_cantidad = array();   
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
            $cantidad    = 0;
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                $cantidad          += $array[1];
                $precio            =  $array[0]->precio;
                $precioIngrediente =  ($precio*$cantidad)/100;
                $precioPlato       += $precioIngrediente;
            } 
            return $precioPlato;
        } 

        public function calorias(){
            $caloriasPlato = 0;
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                $calorias            = $array[0]->calorias; // calorias/100
                $cantidad            = $array[1]; 
                $caloriasIngrediente = ($calorias*$cantidad)/100;
                $caloriasPlato       += $caloriasIngrediente;
            } 
            return $caloriasPlato;
        }

        public function muestraPlato(){ // metodo de la clase interfaz
            echo "<ol>";
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                if ($array[0]->alergeno != null) {
                    $rojo  = 0;
                    $verde = 0;
                    $azul  = 0;
                    $array[0]->alergeno->getColor($rojo, $verde, $azul);
                    
                    echo "<li style='background-color: rgb($rojo, $verde, $azul)'>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
                }else {
                    echo "<li>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
                }
            }
            echo "</ol>";
        }

        public function recipiente($recipiente){// metodo de la clase interfaz
            return $recipiente;
        } 
        public function cubiertos($cubierto1, $cubierto2){// metodo de la clase interfaz
            return $cubierto1 . $cubierto2;
        }  
    }


    class PlatoPreparado extends Plato implements Complementos {
        private $fecha_elaboracion; 
        private $diasComestible;
        
        public function __construct($nombre, $ingredientes_cantidad, $diasComestible = 4) { 
            parent::__construct($nombre, $ingredientes_cantidad); 
            $this->fecha_elaboracion  = date("Y-m-d");
            $this->diasComestible = $diasComestible;
        }
    

        public function getFechaCaducidad () {
            $fechaReal = date('Y-m-d', strtotime("$this->fecha_elaboracion" .  " + $this->diasComestible days"));
            
            return $fechaReal;
        }

        public function muestraPlato() {  // metodo de la clase interfaz   
            echo "<ol>";
            foreach ($this->ingredientes_cantidad as $posicion => $array){
                if ($array[0]->alergeno == true) {
                    $alergeno = $array[0]->alergeno;
                    $rojo  = 0;
                    $verde = 0;
                    $azul  = 0;
                    $array[0]->alergeno->getColor($rojo, $verde, $azul);
                    echo "<li style='background-color: rgb($rojo, $verde, $azul)'>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
                }else {
                    echo "<li>" . $array[0]->nombre . ": " . $array[1]   . "</li>";
                }
                echo $this->getFechaCaducidad();
            }
            echo "</ol>";
        }

        public function recipiente($recipiente){// metodo de la clase interfaz
            return $recipiente;
        } 
        public function cubiertos($cubierto1, $cubierto2){// metodo de la clase interfaz
            return $cubierto1 + $cubierto2;
        }  
}

?>