<?php
//Ejemplo 1
$color="rojo";

if($color=="rojo"){
    echo "El color es rojo";
}else{
    echo "El color no es rojo";
}
echo "</br>";

//Ejemplo 2
$year=2019;

if(!($year!=2019)){
    echo "Estamos en 2019";
}else{
    echo "No estamos en 2019";
}
    echo "</br>";


//Ejemplo 3
$nombre="PEPITO";
$edad=34;
$ciudad="Teror";
define("mayoria_edad",18);

if((($edad>=mayoria_edad)&&($ciudad==="Teror"))||($nombre!="JUAN")){
    echo "Hola $nombre, eres mayor de edad y eres de $ciudad";
}else{
    echo 'Hola '.$nombre.', no eres mayor de edad y no eres de'.$ciudad;
}
echo "</br>";

//Ejemplo 4
$dia=3;

if($dia==1){
    echo "Es Lunes";
}elseif($dia==2){
    echo "Es martes";
}elseif ($dia==3) {
    echo "Es miercoles";
}else{
    echo "Es otro dia";
}
echo "</br>";

//Ejemplo 5
switch ($dia) {
    case 1:
        echo "Es LUNES";
        break;
    case 2;
        echo "Es MARTES";
        break;
    default:
        echo "No es ni LUNES ni MARTES";
        break;
}
echo "</br>";


//Ejemplo 6
goto marca;
echo "<h3>Intruccion 1</h3>";
echo "<h3>Intruccion 2</h3>";
echo "<h3>Intruccion 3</h3>";

marca:
    echo "<h3>Me salto instrucciones</h3>";
?>
