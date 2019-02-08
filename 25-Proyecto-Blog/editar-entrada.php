<?php 
    require_once "includes/redireccion.php";
?>
<?php
    require_once "includes/cabeceras.php";
?>    

<?php
    require_once "includes/sidebar.php";
?>
<section id="contenido">
<?php
    $entradaid=conseguirEntrada($conexiondb,$_GET['id']);
    if(empty($entradaid)):
        header("Location: index.php");
    endif;
    if(!empty($entradaid)):
        $entrada=mysqli_fetch_assoc($entradaid);?>
        <h1>Editar Entrada</h1>
        <p>
            Edite la entrada <?=$entrada['titulo']?>
        </p>
        <form action="actions/guardar-entrada-modificada.php?id=<?=$_GET['id']?>" method="post">
            <label for="titulo-ent">Título</label>
            <input type="text" name="titulo-ent" value="<?=$entrada['titulo']?>">
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'titulo-ent'):'';?>
            <label for="desc-ent">Descripcion</label>
            <textarea name="desc-ent"><?=$entrada['descripcion']?></textarea>
            <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'desc-ent'):'';?>
            <label for="cat-ent">Categoría</label>
            <select name="cat-ent">
                <option disabled selected>Categoría seleccionada:<?=$entrada['nombre']?></option>
                <?php $categorias=conseguirCategorias($conexiondb);?>
                <?php 
                        if(!empty($categorias)):
                            while($categoria=mysqli_fetch_assoc($categorias)):?>
                                <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>
                    <?php   endwhile;
                        endif;?>
            </select>
            <input type="submit" value="Guardar">
        </form>
    <?php        
        endif;
    ?>
</section>
<?=borrarErrores();?>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>