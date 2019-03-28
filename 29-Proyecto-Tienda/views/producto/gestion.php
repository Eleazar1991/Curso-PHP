<h1>Gestion de productos</h1>
<?php   if(isset($_SESSION['prod-completado'])):?>                    
        <?php echo "<div class='alert green'>".$_SESSION['prod-completado']."</div>" ?>
<?php   elseif(isset($_SESSION['errores']['prod-general'])): ?>
        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'prod-general'):'';?>
<?php   endif;?>

<a class="button button-small" href="<?=base_url?>producto/crear">Crear Productos</a>


<table>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>
    </tr>
    <?php while($prod=$productos->fetch_object()):?>
        <tr>
            <td><?=$prod->titulo?></td>
            <td><?=$prod->descripcion?></td>
            <td><?=$prod->precio?></td>
            <td><?=$prod->stock?></td>
            <td>
                <a class="button button-small button-red" href="<?=base_url?>producto/delete&id=<?=$prod->id?>">Borrar</a>
                <a class="button button-small" href="<?=base_url?>producto/modificar&id=<?=$prod->id?>">Modificar</a></td>
            </td> 
        </tr>
    <?php endwhile; ?>
</table>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('prod-completado')?>
<?php Utils::deleteSession('prod-general')?>
<?php Utils::deleteSession('producto')?>