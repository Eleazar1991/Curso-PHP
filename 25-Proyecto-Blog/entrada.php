<?php
    require_once "includes/cabeceras.php";
?>    

<?php
    require_once "includes/sidebar.php";
?>
<!-- caja principal -->
<section id="contenido">
    <?php
        $entradaid=conseguirEntrada($conexiondb,$_GET['id']);
        if(empty($entradaid)):
            header("Location: index.php");
        endif;
        if(!empty($entradaid)):
            $entrada=mysqli_fetch_assoc($entradaid);?>

                <article class="entrada">   
                    <h2><?=$entrada['titulo']?></h2>
                    <span class="fecha">[<?=$entrada['fecha']?>] <a href="categoria.php?id='<?=$entrada['categoria_id']?>'">[<?=$entrada['nombre']?>]</a> [<?=$entrada['usuario']?>]</span>
                    <!-- Mostramos 180 caracteres de toda la descripción -->
                    <p><?=$entrada['descripcion']?></p>
                    <?php if((isset($_SESSION['usuario'])&&($_SESSION['usuario']['id']==$entrada['usuario_id']))):?>
                            <div id="ed-ent">
                                <a href="editar-entrada.php?id=<?=$entrada['id']?>" class="boton">Editar Entrada</a>  
                                <a href="actions/eliminar-entrada.php?id=<?=$entrada['id']?>" class="boton boton-rojo">Eliminar Entrada</a>
                            </div>
                    <?php endif;?> 
                </article>         
    <?php        
        endif;
    ?>

</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>