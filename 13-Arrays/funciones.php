<?php
$cantantes = ['2Pac','Notorius','Wutang','Mustafa'];

//Ordenar
asort($cantantes);
var_dump($cantantes);
arsort($cantantes);
var_dump($cantantes);
sort($cantantes);
var_dump($cantantes);

//Añadir elementos a un array
$cantantes[]='Bisbal';
var_dump($cantantes);
array_push($cantantes,'Estopa');
var_dump($cantantes);

//Eliminar elementos de un array
array_pop($cantantes);
var_dump($cantantes);
unset($cantantes[1]);
var_dump($cantantes);

//Elementos aleatorios
echo $cantantes[array_rand($cantantes)];

//Invertir
var_dump(array_reverse($cantantes));

//Buscar dentro de un array
var_dump(array_search('Bisbal',$cantantes));
var_dump(array_search('Ozuna',$cantantes));

//Contar
var_dump(count($cantantes));
var_dump(sizeof($cantantes));
?>