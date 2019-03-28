<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estilogenerales.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estiloheader.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estilomenu.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estilosidebar.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estilocontenido.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/estilofooter.css">
    <title>Tienda de Camisetas</title>
</head>
<body>
    <div id="container">
       <!-- Cabecera -->
       <header id="header">
           <div id="logo">
                <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?=base_url?>">
                    <h1>Tienda de Camisetas</h1>
                </a>
            </div>
       </header>
       <!-- Menu -->
       <?php $categorias=Utils::showCategorias();?>
       <nav id="menu">
            <ul>
                <li><a href="<?=base_url?>">Inicio</a></li>    
                <?php while($cat=$categorias->fetch_object()):?>
                    <li><a href="<?=base_url?>producto/categoria&categoria_id=<?=$cat->id?>"><?=$cat->nombre?></a></li>
                <?php endwhile; ?>
            </ul>
       </nav>
       <div id="content">
