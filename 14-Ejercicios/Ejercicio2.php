<?php
require 'Ejercicio1.php';
$array=[];
$valor=0;

while(sizeof($array)<=120){
    array_push($array,$valor);
    $valor++;
}

muestra_array($array);
echo "</hr>";
?>
