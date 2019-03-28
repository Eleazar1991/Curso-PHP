<?php   if(isset($pedido_total)):?>
            <?php if(isset($_SESSION['admin']) && ($_GET['action']=="one_all")):?>
                    <h3>Cambiar estado del pedido</h3>
                    <form action="<?=base_url?>pedido/update_state&id=<?=$_GET['id']?>" method="post">
                        <label for="estado">
                            <select name="estado">
                                <option value="confirmado">Confirmado</option>
                                <option value="preparacion">En preparacion</option>
                                <option value="preparado">Preparado</option>
                                <option value="enviado">Enviado</option>
                            </select>
                            <input type="submit" value="Modificar">
                        </label>
                    </form>
            <?php endif;?>
            <h3>Datos del pedido:</h3>
                <?php if(isset($_SESSION['admin']) && ($_GET['action']=="one_all")):?>
                    <p>Pedido realizado por: <?=$pedido_total->nombre?> <?=$pedido_total->apellidos?></p>
                    <p>Email: <?=$pedido_total->email?></p> 
                <?php endif;?>
               <p>Número de pedido: <?=$pedido_total->id?></p> 
               <p>Total a pagar: <?=$pedido_total->coste?>&euro;</p>
               <p>Direccion de Envio: <?=$pedido_total->provincia?> - <?=$pedido_total->localidad?> - <?=$pedido_total->direccion?></p> 
               <p>Estado del pedido: <?=$pedido_total->estado?></p>
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