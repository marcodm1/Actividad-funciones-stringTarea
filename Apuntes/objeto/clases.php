<?PHP
    require_once("interfaz.php");

    class Alergeno {
        private $alergeno;
        private $colorR;   
        private $colorG;   
        private $colorB;
        public static $cantidadAlergenos = 0; // es un atributo relacionado a la clase, no a los objetos creados   

        // constructor magico
        public function __construct($alergeno, $colorR, $colorG, $colorB) { // colores entre 0 y 255 ok
            $this->alergeno = $alergeno;                                    
            $this->colorR   = $colorR;
            $this->colorG   = $colorG;
            $this->colorB   = $colorB;
            self::$cantidadAlergenos ++; // accedemos a un atriubuto static con el self::
        }
        // getter normal
        public function getColor(&$rojo, &$verde, &$azul){ // por referencia
            $rojo  = $this->colorR;
            $verde = $this->colorG;
            $azul  = $this->colorB;
        }

        public function getNombre(){ // por referencia
            return $this->alergeno;
            
        }

        // toString magico
        public function __toString() { // en php no se usan ni los getters ni los setters ni los toString normales 
            return "Este objeto tiene: " . $this->alergeno . ", ". $this->colorR . ", ". 
                        $this->colorG . ", ". $this->colorB . ": y la media del color es: " . $this->mediaColor() . ".<br>";
        }

        // function normal que llama a una function static
        private function mediaColor() { // metodos private solo se accede a ellos desde otra funcion dentro del objeto
            return ($this->colorR + $this->colorG + $this->colorB)/3 . self::inicial(); // aqui llamo a function static, pero al reves no podria
        }

        private static function inicial() { // solo se accede a ellos desde otra funcion dentro del objeto
            return "Aqui esta la static function"; // un function static solo puede llamar a otro metodo static, no como Ej:mediaColor()
        }

        public static function ordenar(&$arrayAlergenos) {
            usort($arrayAlergenos, function ($a, $b){
                return strcmp($a->getNombre(), $b->getNombre());
            });
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
        // con el set tambien
        public function __get($atributo){  // si llaman a una propiedad que no existe o es privada, entra al __getter magioco                                                                   
                                            // la diff con un get normal es si llaman a una propiedad que no existe
            if ($atributo == "resumen") {  // aqui llamamos al atributo "resumen" que no existe
                return "Nombre " . $this->nombre . " y precio " . $this->precio . "€/kg";    
            }

            switch($atributo) { // esto es como hacer muchos getters pero en uno
                case "nombre":
                    return $this->nombre;
                case "calorias":
                    return $this->calorias;
                case "precio":
                    return $this->precio;
                case "tipo":
                    return $this->tipo;
                case "alergeno":
                    return $this->alergeno;
                default: echo "Error: " . $atributo . ": esta propiedad no existe";
            }
        }

        public function __set($atributo, $valor){ // para modificar a una propiedad private, se suele usar set                                                                     
            if ($atributo == "resumen") {  // aqui llamamos al atributo "resumen" que no existe
                $this->nombre . $this->valor;    
            }

            switch ($atributo) { // esto es como hacer muchos getters pero en uno
                case "nombre":
                    $this->nombre = $valor;
                    break;
                case "calorias":
                    $this->calorias = $calorias;
                    break;
                case "precio":
                    $this->precio = $precio;
                    break;
                case "tipo":
                    $this->tipo = $tipo;
                    break;
                case "alergeno":
                    $this->alergeno = $alergeno;
                    break;
                default: echo "Error: " . $atributo . ": esta propiedad no existe";
            }
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