<?php
require_once "conexion.php";
require_once "helper.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="./assets/css/estilo.css">
    <title>Blog de Videojuegos</title>
</head>
<body>
    <!-- Cabecera -->
    <header id="header">
        <!-- Logo -->
        <div id="logo">
            <a href="index.php">
                Blog de Videojuegos
            </a>
        </div>
        <!-- Menu -->
        <?php $categorias=conseguirCategorias($conexiondb);?>
        <nav id="menu">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <?php 
                    if(!empty($categorias)):
                        while($categoria=mysqli_fetch_assoc($categorias)):?>
                            <li> <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a></li>
                <?php   endwhile;
                    endif;?>
                <li><a href="index.php">Sobre mi</a></li>
                <li><a href="index.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
<div id="container">