<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
<?php

    class Coche {
        private $color;
        private $velocidad;

        public function __construct($color, $velocidad) {
            $this->color     = $color;
            $this->velocidad = $velocidad;
        }
        public function __get($propiedad) {
            if (property_exists($this, $propiedad)) {
                return $this->$propiedad;
            }else {
                echo "No existe la propiedad indicada.";
            }
        }
        public function __set($propiedad, $valor){
            if (property_exists($this, $propiedad)) {
                $this->$propiedad = $valor;
            } else {
                echo "No existe la propiedad indicada.";
            }
        }
    }


    $seat = new Coche("rojo", "100");
    $seat->caca;
    echo "<br>";
    echo "El color es: ";
    echo $seat->color;
    echo "<br>";
    echo "La velocidad es de: ";
    echo $seat->velocidad;
    echo "<br>";
    $seat->color = "naranja";
    echo "Ahora el color es: " . $seat->color . "<br>";
    $seat->velocidad = 0;
    echo "Ahora la velocidad es de: " . $seat->velocidad;
    echo "<br>";
    echo "<br>";

?>
</body>
</html>
