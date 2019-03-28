<?php
require_once '../vendor/autoload.php';

//Conexion a la BD para contar el numero de elementos totales
$db = new mysqli("localhost","root","","notas_poo");
$db->query("SET NAMES 'utf8'");

//Obtenemos todas las notas
$notas=$db->query("SELECT * FROM notas");
//Numero total de notas
$num_elementos= $notas->num_rows;

//Paginacion
$pagination = new Zebra_Pagination();
//Numero total de elementos
$pagination->records($num_elementos);
//Numero total de elementos por página
$pagination->records_per_page(2);

$page=$pagination->get_page();
$inicio=(($page-1)*2);
$notas_pagina=$db->query("SELECT * FROM notas LIMIT $inicio,2;");

//Incluimos un estilo para la paginacion
echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';

while($nota=$notas_pagina->fetch_object()){
    echo "<h1>$nota->titulo</h1>";
    echo "<p>$nota->descripcion</p>";
    echo "<hr>";
}
//Realiza los links para la paginacion pero sin estilo (formato lista)
$pagination->render();
?>