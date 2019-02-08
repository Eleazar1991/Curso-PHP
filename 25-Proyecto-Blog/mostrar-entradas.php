<?php
    require_once "includes/cabeceras.php";
?>    

<?php
    require_once "includes/sidebar.php";
?>

<!-- caja principal -->
<section id="contenido">
    <h1>Todas las entradas</h1>
    <?php $entradas=conseguirEntradas($conexiondb);?>
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
        endif; ?>      
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>