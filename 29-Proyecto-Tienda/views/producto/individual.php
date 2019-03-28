<?php if(is_object($producto)):?>
    <h1><?=$producto->titulo?></h1>
    <div id="detail-product">
        <?php if($producto->imagen != null):?>
            <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="Camiseta">
        <?php else:?>
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta">
        <?php endif;?>
        <div id="detail-product--data">
            <p><?=$producto->descripcion?></p>
            <p><?=$producto->precio?> &euro;</p>
            <form action="<?=base_url?>carrito/add&id=<?=$producto->id?>" method="POST">
                <p><label for="cantidad"><input type="number" name="cantidad" value="1" min="1"></label></p>
                <input type="submit" class="button" value="Comprar">
            </form>
        </div>
    </div>
<?php else:?>
    <h1>Este producto no existe</h1>
<?php endif;?>