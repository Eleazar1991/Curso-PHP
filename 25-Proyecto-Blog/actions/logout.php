<?php
session_start();
if(isset($_SESSION['usuario'])){
    $_SESSION['usuario']=null;
    session_destroy();
} 
var_dump($_SESSION);
header("Location:../index.php");   
?>