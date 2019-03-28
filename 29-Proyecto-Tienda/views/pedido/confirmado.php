<?php   if(isset($_SESSION['ped-completado'])):?>                    
            <h1>Tu pedido se ha confirmado</h1>
            <p>Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria
                a la cuenta XXX-XXXX-XXXX-XXXX con el coste del pedido, será procesado y enviado.
            </p>
    <?php   if(isset($pedido_total)):?>
            <h3>Datos del pedido:</h3>
               <p>Número de pedido: <?=$pedido_total->id?></p> 
               <p>Total a pagar: <?=$pedido_total->coste?>&euro;</p> 
               <p> Productos:
                    <table>
                    <tr>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Unidades</th>
                    </tr>   
                    <?php while($producto=$productos->fetch_object()): ?>
                        <tr>
                            <td>
                                <?php if($producto->imagen != null):?>
                                    <img src="<?=base_url?>/uploads/images/<?=$producto->imagen?>" alt="Imagen Producto" class="img_carrito">
                                <?php else:?>
                                    <img src="<?=base_url?>/assets/img/camiseta.png" alt="Imagen Producto" class="img_carrito">
                                <?php endif;?>
                            </td>
                            <td><?=$producto->titulo?></td>
                            <td><?=$producto->precio?>&euro;</td>
                            <td><?=$producto->unidades?></td>
                        </tr>    
                    <?php endwhile;?>
                    </table>
                </p> 
    <?php   endif;?>        
<?php   elseif(isset($_SESSION['errores']['ped-general'])): ?>
            <h1>Tu pedido no ha sido procesado</h1>
<?php   endif;?>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('ped-completado')?>
<?php Utils::deleteSession('ped-general')?>
<?php Utils::deleteSession('pedido')?>
<?php Utils::deleteSession('carrito')?>

