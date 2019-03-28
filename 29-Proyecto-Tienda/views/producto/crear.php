<h1>Crear nuevo producto</h1>
<?php   if(isset($_SESSION['prod-completado'])):?>                    
        <?php echo "<div class='alert green'>".$_SESSION['prod-completado']."</div>" ?>
<?php   elseif(isset($_SESSION['errores']['prod-general'])): ?>
        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-general'):'';?>
<?php   endif;?>
<form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
    <label for="name">Titulo:<input type="text" name="name" required></label>
    <label for="descripcion">Descripcion:</label><textarea name="descripcion" required></textarea>
    <label for="precio">Precio:<input type="text" name="precio" required></label>
    <label for="stock">Stock:</label><input type="number" name="stock" min="1">
    <label for="categoria_id">Categoria:
        <?php $categorias=Utils::showCategorias();?>
        <select name="categoria" >
        <?php while($cat=$categorias->fetch_object()):?>
            <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
        <?php endwhile; ?>   
        </select>
    </label>
    <label for="imagen">Imagen:<input type="file" name="imagen"></label>
    <input type="submit" value="Guardar">
</form>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('prod-completado')?>
<?php Utils::deleteSession('prod-general')?>
<?php Utils::deleteSession('producto')?>