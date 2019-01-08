<?php
$array=[1,2,3,4,5];
$int=2;
$string="texto para el ejercicio";
$bool=true;

function tipo($variable){
    if(is_array($variable)){
        echo "La variable es un array</br>";
    }elseif(is_string($variable)){
        echo "La variable es un string</br>";
    }elseif(is_int($variable)){
        echo "La variable es un int</br>";
    }elseif(is_bool($variable)){
        echo "La variable es un bool</br>";
    }
}

tipo($bool);
tipo($string);
tipo($array);
tipo($int);
?>