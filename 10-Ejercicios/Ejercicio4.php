<?php
//Recoger 2 numeros pasados por querystring($_get) 
//y realizar todas las operaciones basicas de una calculadora con estos numeros
var_dump($_GET);
if(isset($_GET['numero1'])&&isset($_GET['numero2'])){
    $numero1=(int)$_GET['numero1'];
    $numero2=(int)$_GET['numero2'];
    echo "Suma: ".($numero1+$numero2)."</br>";
    echo "Resta: ".($numero1-$numero2)."</br>";
    echo "Multiplicacion: ".($numero1*$numero2)."</br>";
    echo "Division: ".($numero1/$numero2)."</br>";
}else{
    echo "<h1>Introduzca los parametros por querystring</h1>";
}
?>