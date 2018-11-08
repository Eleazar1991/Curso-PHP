<?php
$numero=0;

while ($numero<11){
    echo $numero."</br>";
    $numero++;
    if($numero==5){
        echo "Me las piro vampiro!!!</br>";
        break;
    }
}
echo "He contado hasta $numero </br>";

//Ejemplo pasando por querystring ?numero=valor
if(isset($_GET['numero'])){
    $numero=(int)$_GET['numero'];
}else{
    $numero=1;
}
echo "Tabla de multiplicar del número $numero";
$producto=0;
while($producto<=10){
    echo "$numero x $producto = ".($numero*$producto)."</br>";
    $producto++;
}


//Ejemplo2
$edad=18;
$contador=1;
do{
    echo "Tienes acceso,eres mayor de edad $contador </br>";
    $contador++;
}while(($edad>=18)&&($contador<=10));

//Ejemplo 3
$resultado=0;
for($i=0;($i<=100);$i++){
    $resultado+=$i;
}
echo "La suma de todos los numeros del 1 al 100 es $resultado</br>";
?>