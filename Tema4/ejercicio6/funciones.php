<?php

    function validaDado($rand) {
        if ($rand == DADO_GANADOR) {
            return true;
        }else {
            return false;
        }
    }
?>