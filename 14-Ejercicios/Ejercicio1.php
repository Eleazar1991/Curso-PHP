<?php
$array=[2,4,1,3,6,8,5,7];

//Recorrer array y mostrarlo
function muestra_array($array){
    foreach ($array as $numero){
        echo "El número $numero </br>";
    }
}

echo "<h1>Mostrar el array</h1>";
muestra_array($array);
echo "<hr/>";

//Ordenarlo y mostrarlo
echo "<h1>Ordenar y Mostrar el array</h1>";
sort($array);
muestra_array($array);
echo "<hr/>";

//Mostrar su longitude
echo "<h1>Longitud del array</h1>";
echo "La longitud del array es: ".sizeof($array)."</br><hr/>";

//Buscar algun elemento
echo "<h1>Buscar elemento en el array</h1>";
if(!empty($array)){
    if(isset($_GET['numero'])){
        echo "El elemento 3 esta en la posición: ".array_search(4,$array)."</br><hr/>";
    }else{
        echo "Introduzca el parametro para realizar la búsqueda en el array </br><hr/>";
    }
    
}else{
    echo "El array no existe </br><hr/>";
}
?>