<?php

              // operaciones logicas: AND, OR, XOR, &&, NOT.
        // false: si no es nada... es false: cadena vacia, null y no se si algo mas, son false.
        // true:  si es algo...    es true: cadena no vacia, ao cualquier...
        var_dump(true and false); // me devuelve false.
        var_dump("hola" and null); // me devuelve false.

                //los decimales van del 0 al 9
                //los octales van del 0 al 7
                //los hexadecimales van del 0 al
        $decimal = 2;       // representa el 2 decimal
        $octal = 010;       // representa el 8 decimal
        $hecadecimal = 0xf; // representa al 15 decimal

        echo "<br>" . $decimal . "<br>";
        echo $octal . "<br>";
        echo $hecadecimal . "<br>";

        var_dump(2 + "23");     // imprime 25 int
        echo "<br>";
        var_dump(2 + (int)"dasdsad"); // imprime 2 int hay que especificar (int)
        echo "<br>";
        var_dump(2 + (int)"3dasdsad3"); // imprime 5 int
        echo "<br>";
        var_dump(2 + "3dasgdgdf213123dsad3"); // imprime error si no especifico que se convierta
        echo "<br>";
        echo (true + "1e2"); // 101 porque e es 10 ^2 + 1 de true
        echo "<br>";
        var_dump ("2" + 3);     // 5 int
        echo "<br>";
        // operaciones de comparacion... == != >= <= < >
        var_dump("hola" != "adios");
        echo "<br>";
        $a = 12 . 2.3 . "4";
        echo $a; // 122.34

        // gettype
        echo "<br>";
        $a = false;
        var_dump($a);
        echo "<br>";



?>