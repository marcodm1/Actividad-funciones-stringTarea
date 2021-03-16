<?PHP

    class Sala {
        public static $identificador = 0; 
        private $metrosCuadrados;   
        private $capacidad;  // m^2 / 1.5

        public function __construct($metrosCuadrados) { 
            $this->metrosCuadrados = $metrosCuadrados;
            self::$identificador ++; 
            
        }
        public function getCapacidad(){
            return $metrosCuadrados/1.5
        }
    }

    class Monitor {
        private $nombre;
        private $sueldo;
        private $especialidad;
        const SUELDOBASE = 1000;


        public function __construct($nombre, $sueldo, $especialidad) { 
            $this->nombre = $nombre;
            if ($sueldo < 0) {
                $this->sueldo = SUELDOBASE;
            }else {
                $this->sueldo = $sueldo
            }
            $this->especialidad = $especialidad;
        }
    }

    class Actividad  {
        public $nombre;
        public $monitor;        // que es un monitor, el cual dirige la actividad. es de la clase monitor
        public $duracion;       // fecha de minutos que dura la actividad.
        public $precioPersona;  // precio por persona al mes
        public static $instancia; 
    
        public function __construct($nombre, $monitor, $duracion, $precioPersona) { 
            $this->nombre                = $nombre; 
            $this->alumnos_fecha = array();   
        }

        public static function singleton(){    
            if (!isset(self::$instancia)) {     
                $miclase = __CLASS__;           
                self::$instancia = new $miclase;
            }
            return self::$instancia; 
        } 

        public function __get($atributo){  
            switch($atributo) {
                case "nombre":
                    return $this->nombre;
                case "monitor":
                    return $this->monitor;
                case "duracion":
                    return $this->duracion;
                case "precioPersona":
                    return $this->precioPersona;
                
                default: return 10;
            }
        }

        public function getColor(){
            if ($this->precioPersona < 20) {
                return "verde";
            }

            if ($this->precioPersona > 20 && $this->precioPersona < 50) {
                return "amarillo";
            }

            if ($this->precioPersona > 50) {
                return "rojo";
            }

        }
        
    }


    class ActividadGrupal extends Actividad {
        private $sala; // objeto sala ??
        private $alumnosMatriculados; // es una array con el alumno y fecha matriculacion
        
        public function __construct($sala) { 
            parent::__construct($nombre, $monitor, $duracion, $precioPersona);
            $this->fecha_elaboracion  = $sala;
        }

        public function addAlumno($alumno, $fecha = null) {
            if (count($this->sala->capacidad) < $this->sala->capacidad) {
                if ($fecha == null) {
                   $this->fecha = date("d-m-Y"); 
                } else {
                    $this->fecha = $fecha;
                } 
                $array1 = array($alumno, $fecha);
                $this->alumnosMatriculados[] = $array1;
                return true;
            }else {
                return false;
            }
        }

        function getDisponibles() {
            $completo = $this->sala->capacidad;
            $opcupadas = count($this->alumnosMatriculados);
            $disponibles = $completo - $ocupadas; 
            return $disponibles;
        }

        function listado() {
            
            echo "<table>";
                echo "<tr>";
                    echo "<th>";
                    echo $this->nombre;
                    echo "</th>";
                echo "</tr>";

                echo "<tr>";
                    if (count($this->alumnosMatriculados) == 0) {
                        echo "No hay alumnos registrados";
                    }else {
                        foreach ($this->alumnosMatriculados as $clave => $valor){
                            echo "<td> nombre alumno: " . $clave . " fecha: " . $valor . "</td>";
                        }
                    }
                echo "</tr>";

            echo "</table>";
            /*
                método listado():, como contenido los alumno y la fecha en la que se han
                matriculado con el formato día/mes/año. 
                Si no hay ningún alumno matriculado que lo indique.
            */

        }


    }


?>