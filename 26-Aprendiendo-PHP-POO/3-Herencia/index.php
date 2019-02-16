<?php
require_once 'clases.php';

$persona=new Persona();
// $persona->setNombre("Eleazar");
var_dump($persona);

$informatico=new Informatico();
// $informatico->setAltura(1.9);
// echo $informatico->sabeLenguajes("HTML; CSS; JS; PHP");
var_dump($informatico);


$tecnico= new TecnicoRedes();
var_dump($tecnico);
?>