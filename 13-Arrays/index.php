<?php
$peliculas= array('Batman','Ironman', 'Spiderman');
var_dump($peliculas);
echo "La pelicula $peliculas[2]";

$cantantes = ['2Pac','Notorius','Wutang'];
var_dump($cantantes);
echo "El cantante $cantantes[0]";

echo "<h1>Listado de cantantes</h1><ul>";
for($i=0;$i<count($cantantes);$i++){
    echo "<li>".$cantantes[$i]."</li>";
}
echo "</ul>";

echo "<h1>Listado de peliculas</h1><ul>";
foreach ($peliculas as $pelicula){
    echo "<li>".$pelicula."</li>";
}
echo "</ul>";

//Arrays asociativos
$personas=array(
    'nombre'=>'Eleazar',
    'apellido'=>'Perez',
    'Sexo'=>'Hombre'
);
var_dump($personas);
echo $personas['apellido']."</br>";
foreach($personas as $key=>$value)
    echo "Su $key es $value</br>";

//Arrays Multidimensionales 
$contactos =array(
    array(
        'nombre'=> 'Pepe',
        'Movil'=> '666666666'
    ),
    array(
        'nombre'=> 'Juan',
        'Movil'=> '555555555'
    ),
    array(
        'nombre'=> 'Luis',
        'Movil'=> '444444444'
    ),
);

echo $contactos[1]['Movil']."</br>";
foreach($contactos as $key=>$contacto)
    echo "El contacto ".$contacto['nombre']." tiene el número de telefono ".$contacto['Movil']."</br>";

?>