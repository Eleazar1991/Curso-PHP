<?php
/*Conexion a la BD*/
$server="localhost";
$username="root";
$password="";
$database="blog_master";
$conexiondb=mysqli_connect($server, $username, $password, $database);

mysqli_query($conexiondb,"SET NAMES 'utf8'");

/*Iniciar sesion si no esta la sesion iniciada*/
if(!isset($_SESSION)){
    session_start();
}
?>