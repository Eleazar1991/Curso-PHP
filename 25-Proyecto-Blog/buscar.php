<?php
    require_once "includes/cabeceras.php";
?>  
<?php
?>   
<?php
    if(!isset($_POST['busqueda']) || empty($_POST['busqueda'])){
        header("Location: index.php?error=Inserte un titulo");
    }
    $busqueda=buscarEntradas($conexiondb,$_POST['busqueda']);    
?>
<?php
    require_once "includes/sidebar.php";
?>
<section id="contenido">
    <h1>Búsqueda "<?=$_POST['busqueda']?>"</h1>
    <?php
        if(!empty($busqueda)):
           while($entrada=mysqli_fetch_assoc($busqueda)):?>
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
            <div class="alerta">No hay entradas con ese titulo</div>
    <?php
        endif; ?>      
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>