
<?php if (!empty($total_pedidos) && !empty($total_productos)):?>
    <h1>Pedidos realizados</h1>
    <?php if(isset($_SESSION['mod-completed'])):?>
        <strong class="alert green"><?=$_SESSION['mod-completed']?></strong>
    <?php elseif(isset($_SESSION['errores']['mod-failed'])):?>
        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'mod-failed'):'';?>
    <?php endif;?>
    <table>
            <tr>
                <th>Nº Pedido</th>
                <th>Coste</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Productos</th>
            </tr>
        <?php foreach ($total_pedidos as $indice => $pedido):?>
                <tr>
                    <?php if(isset($_GET['action']) && $_GET['action']=="mis_pedidos"):?>
                        <td><a href="<?=base_url?>/pedido/one&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
                    <?php else:?>
                        <td><a href="<?=base_url?>/pedido/one_all&id=<?=$pedido->id?>"><?=$pedido->id?></a></td>
                    <?php endif;?>
                    <td><?=$pedido->coste?>&euro;</td>
                    <td><?=$pedido->estado?></td>
                    <td><?=$pedido->fecha?></td>
                    <td>
                    <?php while($producto=$total_productos[$indice]->fetch_object()):?>
                         <p><?=$producto->titulo?> - <?=$producto->unidades?> ud. - <?=$producto->precio?>&euro;</p>
                    <?php endwhile;?>
                    </td>
                </tr>   
        <?php endforeach;?>
    </table>
<?php else:?>
    <h1>No hay pedidos realizados en su cuenta</h1>
<?php endif;?>
<?php Utils::deleteSession('mod-completed')?>
<?php Utils::deleteSession('errores')?>



