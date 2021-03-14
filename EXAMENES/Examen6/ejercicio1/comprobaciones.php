<?php
    function eventOk() {
        if (date('Y-m-d',strtotime($fecha)) < date("d-m-Y")) { // convierto $fecha que es un string a time, y de time a date
            echo "la fecha ya ha pasado";
            formularioEvento();
        }
        return eventOkFecha() && comprobarNombre(); // si alguno retorna false, eventOk() retornaria false
    } // si fuese con || con que una sea true eventOk() retornaria true
    function comprobarLoginValido() {
        $consulta = Conexion::singleton();
        $conexion = $consulta->comprobarLogin($login, $password);
        if (!$conexion) {
            echo "Login no válido";

        }
    }
    function eventOkFecha() { // No existe otro evento el mismo día y a la misma hora. 
        if (!$consulta->comprobarFecha($fecha)) {
            echo "coincide con otro evento";
            formularioEvento();
        }else {
            return true;
        }
    }
    function comprobarNombre() { // El nombre del evento no puede contener un número al principio.
        $nombreEvento = $evento;
        $patron       = "/^[a-zA-Z]/";
        if (!preg_match($patron, $nombreEvento) ) {// comprueba si empieza por letra
            echo "nombre del evento incorrecto";
            formularioEvento();
        } 
    }

?>
