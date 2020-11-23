<?php
//comprobar si tiene carcteres mayúscula, minúscula y caracteres especiales.
$abecedario = "abcdefghijklmnñopqrstuvwz";
$numeros = "1234";
$otra = "Abc";
$buena = "Abc@";
echo $abecedario.'<br>';
echo preg_match("/[A-Z][a-z][[:punct:]]/", $abecedario)?"cumple":" no cumple"; //
echo '<br>'.$numeros.'<br>';

echo preg_match("/[A-Z][a-z][[:punct:]]/", $numeros)?"cumple":"no cumple"; //
echo '<br>'.$otra.'<br>';

echo preg_match("/[A-Z][a-z][[:punct:]]/", $otra)?" cumple":"no cumple"; //
echo '<br>'.$buena.'<br>';
echo preg_match("/[[:punct:]][A-Z][a-z]/", $buena)?" cumple":"no cumple"; //
$carespe = ".";echo '<br>'.$carespe.'<br>';
echo preg_match("/[[:punct:]]/", $carespe)?" cumple":"no cumple"; //

 
?>