<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio clases y extends">
	</head>
	    <body>   
            <?php
                class Vehiculo {
                    private $color;
                    private $precio;
                    public function __construct($color, $precio) {
                        $this->color  = $color;
                        $this->precio = $precio;
                    }

                    public function getColor(){
                        return $this->color;
                    }
                    
                    public function getPrecio(){
                        return $this->precio;
                    }

                    public function setColor($a){
                        $this->color = $a;
                    }
                    
                    public function setPrecio($a){
                        $this->precio = $a;
                    }
                }


                class Quad extends Vehiculo {
                    private $potencia;
                    private $rejilla;
                    public function __construct($potencia, $rejilla, $color, $precio) {
                        parent::__construct($color, $precio);
                        $this->potencia  = $potencia;
                        $this->rejilla = $rejilla;
                    }

                    public function getPotencia(){
                        return $this->potencia;
                    }
                    
                    public function getRejilla(){
                        return $this->rejilla;
                    }

                    public function setPotencia($a){
                        $this->color = $a;
                    }
                    
                    public function setRejilla($a){
                        $this->precio = $a;
                    }
                }
                    

                class MaquinaCoser extends Vehiculo {
                    private $potencia;
                    private $hilo;
                    public function __construct($potencia, $hilo, $color, $precio) {
                        parent::__construct($color, $precio);
                        $this->potencia  = $potencia;
                        $this->hilo      = $hilo;
                    }

                    public function getPotencia(){
                        return $this->potencia;
                    }
                    
                    public function getHilo(){
                        return $this->hilo;
                    }

                    public function setPotencia($a){
                        $this->color = $a;
                    }
                    
                    public function setHilo($a){
                        $this->precio = $a;
                    }
                }

                $maquina = new MaquinaCoser(500, true, "naranja", 230);
                $quad    = new Quad("HCE", true, "verde", 120);

                $maquina->setHilo       = false;
                $quad   ->setRejilla    = false;
                
                echo "La maquina de coser tiene hilo? " . ($maquina->getHilo() ? "Si" : "No") . "<br>";
                echo "El quad tiene rejilla? "          . ($quad->getRejilla() ? "Si" : "No") . "<br>";

        ?>
    </body>
</html>



       

 