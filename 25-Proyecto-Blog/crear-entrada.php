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
    <h1>Crear Entrada</h1>
    <p>
        Añade nuevas entradas al blog
    </p>
    <form action="actions/guardar-entrada.php" method="post">
        <label for="titulo-ent">Título</label>
        <input type="text" name="titulo-ent">
        <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'titulo-ent'):'';?>
        <label for="desc-ent">Descripcion</label>
        <textarea name="desc-ent"></textarea>
        <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'desc-ent'):'';?>
        <label for="cat-ent">Categoría</label>
        <select name="cat-ent">
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
</section>
<?=borrarErrores();?>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>