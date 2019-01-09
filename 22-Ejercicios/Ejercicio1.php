<?php
//Crear sesión que aumente su valor en uno o disminuya en uno en función de si el parámetro 
//get_counter pasado por querystring está a uno o a cero
session_start();

if(!isset($_GET['counter'])){
    $get_counter=0;
    $_SESSION['value']=1;
}else{
    $get_counter=(int)$_GET['counter'];
}

var_dump($get_counter);

switch($get_counter){
    case 0:
        $_SESSION['value']--;
        break;
    case 1:
        $_SESSION['value']++;
        break;
    default:
        break;    
}
     
echo 'El valor de $_SESSION es '.$_SESSION["value"];
?>

<a href="Ejercicio1.php?counter=1">Aumentar</a>
<a href="Ejercicio1.php?counter=0">Disminuir</a>