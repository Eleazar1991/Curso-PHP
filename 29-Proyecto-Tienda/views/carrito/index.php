<h1>Carrito de la compra</h1>
<?php if(isset($_SESSION['prod-car-del'])):?>
    <strong class="alert green"><?=$_SESSION['prod-car-del']?></strong>
<?php endif;?>
<?php if(isset($_SESSION['mod-car-completed'])):?>
    <strong class="alert green"><?=$_SESSION['mod-car-completed']?></strong>
<?php endif;?>
<?php if(isset($_SESSION['carrito'])):?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>   
        <?php foreach($_SESSION['carrito'] as $indice=>$producto):?>
            <tr>
                <td>
                    <?php if($_SESSION['carrito'][$indice]['producto']->imagen != null):?>
                        <img src="<?=base_url?>/uploads/images/<?=$_SESSION['carrito'][$indice]['producto']->imagen?>" alt="Imagen Producto" class="img_carrito">
                    <?php else:?>
                        <img src="<?=base_url?>/assets/img/camiseta.png" alt="Imagen Producto" class="img_carrito">
                    <?php endif;?>
                </td>    
                <td><?=$_SESSION['carrito'][$indice]['producto']->titulo?></td>
                <td><?=$_SESSION['carrito'][$indice]['producto']->precio?> &euro;</td>
                <td>
                    <?=$_SESSION['carrito'][$indice]['unidades']?>
                    <div class="modify-product" >
                        <a class="button button-small mod-but" href="<?=base_url?>carrito/modify&index=<?=$indice?>&method=up">+</a>
                        <a class="button button-small mod-but" href="<?=base_url?>carrito/modify&index=<?=$indice?>&method=down">-</a>
                    </div>
                </td>
                <td>
                    <a class="button button-small button-red" href="<?=base_url?>carrito/delete&index=<?=$indice?>">Borrar</a>
                </td> 
            </tr>
        <?php endforeach;?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
         <td><a class="button button-small button-red" href="<?=base_url?>carrito/delete_all">Borrar Todo</a></td>
        </tr>      
    </table>
    <a  class="button button-small total-carrito" href="<?=base_url?>pedido/do">Hacer Pedido</a>
    <h3 id="do-order" class="total-carrito">Total: <?=Utils::statsCarrito()['total']?> &euro;</h3>  
<?php else:?>
    <?php if(isset($_SESSION['prod-car-del-all'])):?>
        <strong class="alert green"><?=$_SESSION['prod-car-del-all']?></strong>
    <?php endif;?>
    <p>No hay productos en el carrito</p>
<?php endif;?>
<?php Utils::deleteSession('prod-car-del')?>
<?php Utils::deleteSession('prod-car-del-all')?>
<?php Utils::deleteSession('mod-car-completed')?>