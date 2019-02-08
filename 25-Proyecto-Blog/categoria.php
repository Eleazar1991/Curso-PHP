<?php
    require_once "includes/cabeceras.php";
?>    
<?php 
    $categoria=conseguirCategoria($conexiondb,$_GET['id']);
    if(!isset($categoria['id'])){
        header("Location: index.php");
    }
?>
<?php
    require_once "includes/sidebar.php";
?>
<section id="contenido">
    <h1>Entradas de <?=$categoria['nombre']?></h1>
    <?php $entradas=conseguirEntradasCategoria($conexiondb,$_GET['id']);?>
    <?php 
        if(!empty($entradas)):
           while($entrada=mysqli_fetch_assoc($entradas)):?>
                <article class="entrada">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha">[<?=$entrada['fecha']?>] [<?=$entrada['nombre']?>]</span>
                        <!-- Mostramos 180 caracteres de toda la descripción -->
                        <p><?=substr($entrada['descripcion'],0,180)."..."?></p>
                    </a>
                </article>
    <?php   endwhile;
        else:?>
            <div class="alerta">No hay clases con esta categoria</div>
    <?php
        endif; ?>      
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>