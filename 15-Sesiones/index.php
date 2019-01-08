<?php
//Iniciar la sesion
session_start();

//Variable normal
$var="Soy una cadena de texto";

//Variable de sesión
$_SESSION['var']="Hola soy una sesión activa";

echo $var."</br>";
echo $_SESSION['var'];
?>