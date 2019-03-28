                <?php if(!$is_categoria):?>
                    <h1>Productos Destacados</h1>
                <?php else: ?>
                    <?php if(is_object($categoria)):?>
                        <h1><?=$categoria->nombre?></h1>
                        <?php if($productos->num_rows==0):?>
                            <p>No hay productos de <?=$categoria->nombre?></p>
                        <?php endif;?>
                    <?php else:?>    
                        <h1>La categoria no existe</h1>
                    <?php endif;?>
                <?php endif;?>
                <?php while($prod=$productos->fetch_object()):?>
                    <div class="product">
                        <a href="<?=base_url?>producto/show&id=<?=$prod->id?>">
                            <?php if($prod->imagen != null):?>
                                <img src="<?=base_url?>/uploads/images/<?=$prod->imagen?>" alt="Camiseta">
                            <?php else:?>
                                <img src="<?=base_url?>/assets/img/camiseta.png" alt="Camiseta">
                            <?php endif;?>
                            <h2><?=$prod->titulo?></h2>
                            <p><?=$prod->precio?> euros</p>
                        </a>
                        <a href="<?=base_url?>producto/show&id=<?=$prod->id?>"class="button">Ver Producto</a>
                    </div>
                <?php endwhile; ?>
            