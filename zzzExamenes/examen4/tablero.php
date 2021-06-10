<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
        <link rel="stylesheet" href="./estilos.css">
	</head>
	<body>
<?php 

    class Tablero {
        private $tablero;       // array con las imágenes del tablero
        private $descubiertas;  // un array con los índices descubiertos hasta ahora
        private $jugada;        // array con el par de casillas destapadas. Es la jugada en curso
        private $directorio;    // lugar donde se encuentran las imágenes

        public function __construct($directorio = "./img/") {
            $this->directorio = $directorio;  // lugar donde se encuentran las imágenes
            if (is_dir($this->directorio)) {
                $array = glob($directorio . "*.jpg");
                $this->tablero =  $array; // array con las imágenes del tablero
            }else {
                return "Error en la seleccion del directorio";
            }
            $this->descubiertas = array();  // un array con los índices descubiertos hasta ahora.
            $this->jugada       = array();  // array con el par de casillas destapadas. Es la jugada en curso.
        }

        public function inicia_tablero() {
            // inicia los valores
        }

        public function tablero() {
            $imagenes = $this->tablero; 
            // mezclarlos
            // Inicia las casillas descubiertas y la jugada como arrays vacíos.
        }

        public function pinta_tablero() {
            ?>
            <div>
                <h2> Juego de memory </h2>
                <table>
                    <tr>
                        <?php
                        $this->pintar1();
                        ?>
                    </tr>  
                    <tr>
                        <?php
                        $this->pintar2();
                        ?>
                    </tr> 
                </table>

                <form action="juego.php" method="post">
                    Seleccione las casillas.<br>
                    <label for="cas1">Casilla 1:</label>
                        <input type="number" name="casilla1" id="cas1"><br>
                    <label for="cas2">Casilla 2:</label>
                        <input type="number" name="casilla2" id="cas2"><br>
                    <input type="submit" value="enviar"><br>
                </form>
               
            </div>

            

            <?php
            
            // Utiliz constantes que me indiquen cuántas columnas mostrar.
            // Mostrará tantas filas como sean necesarias.
            // Tendrá que mostrar un cuadrado negro (puedes usar un span de clase oculta), para
            // todos los que no estén destapados o que no estén en la jugada actual.
            // para el resto mostrará las imágenes correspondientes, que están registradas en tablero.
            // Y completar con blancos si no tengo imágenes suficientes. 
        }

        public function pintar1() {
            shuffle($this->tablero);
            for ($i = 0; $i < count($this->tablero); $i ++) {
                ?>
                <td><?php echo $i ?><img src="<?php echo $this->tablero[$i];  ?>" width="100" height="100" alt="img" value="<?php echo $i;?>"></td>

                <?php
            }
            /*
                ?>
                <td class="oculta" style="float:left"> </td> 
                <?php
            */
        }

        public function pintar2() {
            $total = count($this->tablero);
            shuffle($this->tablero);
            for ($i = 0; $i < count($this->tablero); $i ++) {
                ?>
                <td><?php echo $total; $total++; ?><img src="<?php echo $this->tablero[$i];  ?>" width="100" height="100" alt="img" value="<?php echo $i;?>"></td>

                <?php
            }
            /*
                ?>
                <td class="oculta" style="float:left"> </td> 
                <?php
            */
        }
        public function borra_jugada() {
            header("Location:tablero.php");
        }
        public function jugada_valida($jugada) {
            if (count($jugada) != 2) {
                return "Error: ha seleccionado mas o menos de 2 casillas";
            }
            if ($jugada[0] < 0 || $jugada[0] < $this->tablero) {
                return "Error: ha escrito un numero demasiado elevado o negativo como primer parametro.";
            }
            if ($jugada[1] < 0 || $jugada[1] < $this->tablero) {
                return "Error: ha escrito un numero demasiado elevado o negativo como segundo parametro.";
            }
            if (array_search($jugada[0], $this->destapadas) > 0) {
                return "Error: una de las casillas seleccionadas ya estaba destapada.";
            }
        }

        public function destapar($jugada) {
            $this->jugada = $jugada;
            if ($jugada[0] === $jugada[0]) {

            }
            // Establece el valor del campo jugada con la jugada que nos pasan.
            // Si el contenido de las dos casillas coinciden (son la misma imagen), muestra un mensaje
            // de acierto, y añade esas casillas a las destapadas.
            // En caso contrario informa del fallo.
        }

        public function completado() {
            $completo = false;
            if (count($this->destapadas) === count($this->tablero)) {
                $completo = true;
            }else {
                $completo = false;
            }
            return $completo;
        }
    }

    $t = new Tablero();
    $t->pinta_tablero();
?>
</body>
</html>