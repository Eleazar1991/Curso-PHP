<?php
    require_once "includes/cabeceras.php";
?>    

<?php
    require_once "includes/sidebar.php";
?>

<!-- caja principal -->
<section id="contenido">
    <?php   if(isset($_SESSION['elim_completado'])):?>                    
            <?php echo "<div class='alerta alerta-exito'>".$_SESSION['elim_completado']."</div>" ?>
    <?php   elseif(isset($_SESSION['errores']['elim_general'])): ?>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'elim_general'):'';?>
    <?php   endif;?>
    <?php   if(isset($_SESSION['edit_completado'])):?>                    
            <?php echo "<div class='alerta alerta-exito'>".$_SESSION['edit_completado']."</div>" ?>
    <?php   elseif(isset($_SESSION['errores']['edit_general'])): ?>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'edit_general'):'';?>
    <?php   endif;?>
    <h1>Ultimas entradas</h1>
    <?php $entradas=conseguirEntradas($conexiondb,true);?>
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
    <div id="ver-todas">
        <a href="mostrar-entradas.php">Ver todas las entradas</a>
    </div>
    <?php borrarErrores();?>     
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>