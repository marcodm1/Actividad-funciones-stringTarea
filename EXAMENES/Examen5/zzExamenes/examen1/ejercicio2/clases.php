<?php

    class Jugador {
        private $nombre;
        private $puntos = 0;

        public function __construct($nombre) {
            $this->nombre = $nombre;
        }

        // get magico

        public function sumaPuntos($valor) { // poner por defecto valor = 1
            $this->puntos += $valor;
        }
    }

    class Pregunta {
        private $pregunta;
        private $respuestas = array(); // se puede?
        private $indice; // indice de la respuesta correcta

        public function __construct($pregunta, $respuestas, $indice) {
            $this->pregunta   = $pregunta;
            $this->respuestas = $respuestas;
            $this->indice     = $indice;
        }

        public function etiquetaPregunta($name) {
            //que devuelve los inputs necesarios para mostrar la pregunta dentro de un formulario.
            // Debe recibir como parámetro el valor del atributo name del input radio que 
                //utiliza para las opciones.
            return "";
        }

        public function esCorrecta($opcion) {
            // recibe la opción elgida y devuelve verdadero o falso si coincide con la opción correcta.
        }

    }

    class Trivial {
        private $preguntas       = new Pregunta(); // lo inicio asi o l odejo sin iniciar ?
        private $jugadores       = array();
        private $turno           = false;
        private $preguntaEnCurso = array();

        public function __construct($jugador1, $jugador2) {
            $this->preguntas = new Pregunta($preguntas, $respuestas, $indice);
            $this->jugadores = array($jugador1, $jugador2); // se puede?
            $this->turno     = true; 
            $this->preguntaEnCurso = suffle($preguntaEnCurso);
        }





    }




?>