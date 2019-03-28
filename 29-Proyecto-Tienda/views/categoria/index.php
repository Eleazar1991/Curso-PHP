<h1>Gestionar Categorias</h1>
<a class="button button-small" href="<?=base_url?>categoria/crear">Crear Categoria</a>
<a class="button button-small" href="<?=base_url?>categoria/modificar">Modificar Categoria</a>
<a class="button button-small button-red" href="<?=base_url?>categoria/borrar">Borrar Categoria</a>

<?php   if(isset($_SESSION['cat-completado'])):?>                    
        <?php echo "<div class='alert green'>".$_SESSION['cat-completado']."</div>" ?>
<?php   elseif(isset($_SESSION['errores']['cat-general'])): ?>
        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'cat-general'):'';?>
<?php   endif;?>

<table>
    <th>Nombre Categoria</th>
    <?php while($cat=$categorias->fetch_object()):?>
        <tr>
            <td><?=$cat->nombre?></td>          
        </tr>
    <?php endwhile; ?>
</table>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('cat-completado')?>
<?php Utils::deleteSession('cat-general')?>