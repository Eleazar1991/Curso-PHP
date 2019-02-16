<?php
require_once 'coche.php';

// $coche=new Coche();
// var_dump($coche);

// $coche2=new Coche("Amarillo","Renault","Clio",150,200,3);
// $coche2->color="Azul";
// $coche2->setMarca("Peugeot");
// echo $coche2->getModelo();
// var_dump($coche2);


$coche2=new Coche("Amarillo","Renault","Clio",150,200,3);
echo $coche2->mostrarInfo($coche2);
?>