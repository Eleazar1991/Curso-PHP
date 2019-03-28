<?php $producto=Utils::getProducto($_GET['id'])?>
<?php  if(isset($_GET['id']) && is_object($producto)):?>
        <h1>Modificar Producto <?=$producto->titulo?></h1>

        <?php   if(isset($_SESSION['prod-completado'])):?>                    
                <?php echo "<div class='alert green'>".$_SESSION['prod-completado']."</div>" ?>
        <?php   elseif(isset($_SESSION['errores']['prod-general'])): ?>
                <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-general'):'';?>
        <?php   elseif(isset($_SESSION['errores']['prod-id'])): ?>
                <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-id'):'';?>
        <?php   endif;?>

        <form action="<?=base_url?>/producto/update&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">    
                <p>Introduzca los nuevos valores: </p>    
                <label for="name">Titulo:<input type="text" name="name" placeholder="<?=$producto->titulo?>" value="<?=$producto->titulo?>" required></label>
                
                <?php    if(isset($_SESSION['errores']['prod-titulo'])): ?>
                        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-titulo'):'';?>
                <?php   endif;?>

                <label for="descripcion">Descripcion:</label><textarea name="descripcion" placeholder="<?=$producto->descripcion?>" required><?=$producto->descripcion?></textarea>
                <?php    if(isset($_SESSION['errores']['prod-descripcion'])): ?>
                        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-descripcion'):'';?>
                <?php   endif;?>
                <label for="precio">Precio:<input type="text" name="precio" placeholder="<?=$producto->precio?>" value="<?=$producto->precio?>" required></label>
                
                <?php    if(isset($_SESSION['errores']['prod-precio'])): ?>
                        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-precio'):'';?>
                <?php   endif;?>
                <label for="stock">Stock:</label><input type="number" name="stock" placeholder="<?=$producto->stock?>" value="<?=$producto->stock?>" min="1">
                <?php    if(isset($_SESSION['errores']['prod-stock'])): ?>
                        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-stock'):'';?>
                <?php   endif;?>

                <label for="categoria_id">Categoria:
                <?php $categorias=Utils::showCategorias();?>
                <select name="categoria" > -->
                        
                        <?php $categoria_n=Utils::showCategoriaNombre($producto->categoria_id);
                        ?> 
                        
                        <option selected value="<?=$producto->categoria_id?>">Categoria Seleccionada: <?=$categoria_n->nombre?></option>
                        
                        <?php while($cat=$categorias->fetch_object()):?>
                                <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
                        <?php endwhile; ?>   
                </select>
                </label>
                <label for="imagen">Imagen: </label>
                <?php  if (!empty($producto->imagen)):?>
                        <img src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" alt="">
                <?php endif;?>
                <input type="file" name="imagen">
                
                <?php    if(isset($_SESSION['errores']['prod-imagen'])): ?>
                        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-imagen'):'';?>
                <?php   endif;?>
                
                <input type="submit" value="Modificar">
<?php else:?>
        
        <p>No hay ningun articulo relacionado</p>

<?php endif;?>

        </form>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('prod-completado')?>
<?php Utils::deleteSession('prod-general')?>
<?php Utils::deleteSession('prod-id')?>
<?php Utils::deleteSession('producto')?>