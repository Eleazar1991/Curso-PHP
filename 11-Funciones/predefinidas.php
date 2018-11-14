<?php
//Debuggear
$variable="Prueba ";
var_dump($variable);

//Fecha
echo date('d-m-Y')."</br>";
echo time()."</br>";

//Matematicas
echo "Raiz cuadrada de 10: ".sqrt(10)."</br>";
echo "Numero de un rango entre 10 y 40: ".rand(10,40)."</br>";
echo "Numero pi: ".pi()."</br>";
echo "Redondear: ".round(4.123531,3)."</br>";

//Más funciones predefinidas
echo gettype($variable)."</br>";

echo is_string($variable)."</br>";

if(isset($otravariable)){
    echo "$otravaribale existe </br>";
}else{
    echo "La variable no existe </br> ";
}

$variableprueba=trim($variable);
echo $variableprueba."</br>";

$year=2020;
unset($year);
if(isset($year)){
    echo "$year existe </br>";
}else{
    echo "La variable no existe </br> ";
}

$texto="";
if(empty($texto)){
    echo "La variable esta vacía , NULL, False o no existe </br>";
}else{
    echo "$texto </br>";
}

echo strlen($variable)."</br>";

echo strpos($variable,"e")."</br>";

echo str_replace("e","o",$variable)."</br>";

echo strtolower($variable)."</br>";

echo strtoupper($variable)."</br>";

?>
