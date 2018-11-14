<?php
//Ejemplo 1
$year="2018";

function DameLaFecha($mes,$dia){
    global $year;
    return "$year/$mes/$dia </br><hr/>";
}

echo DameLaFecha(12,2);

//Ejemplo2
function buenosDias(){
   return "Buenos dias"; 
}

function buenosTardes(){
    return "Buenos tardes, ¿Que tal el almuerzo?"; 
}

$horario="buenosDias";
echo $horario()."<hr/>";

$miFuncion="buenos".$_GET['horario'];
echo $miFuncion();
?>