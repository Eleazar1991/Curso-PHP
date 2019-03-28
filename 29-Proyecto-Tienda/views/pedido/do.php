<?php if(isset($_SESSION['identity'])):?>
    <h1>Hacer pedido</h1>
    <?php   if(isset($_SESSION['ped-completado'])):?>                    
            <?php echo "<div class='alert green'>".$_SESSION['ped-completado']."</div>" ?>
    <?php   elseif(isset($_SESSION['errores']['ped-general'])): ?>
            <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'ped-general'):'';?>
    <?php   endif;?>
    <p><a href="<?=base_url?>carrito/index">Ver productos del carrito</a></p>
    <h3>Direccion del envío:</h3>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="provincia">Provincia: <input type="text" name="provincia" required></label>
        <label for="localidad">Localidad: <input type="text" name="localidad" required></label>
        <label for="direccion">Direccion: <input type="text" name="direccion" required></label>
        <input type="submit" value="Confirmar Pedido">
    </form>
<?php else:?>
    <h1>Pedido no realizado</h1>
    <p>Necesitas iniciar sesión en la web para poder realizar tu pedido</p>
<?php endif;?>

<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('ped-completado')?>
<?php Utils::deleteSession('ped-general')?>
<?php Utils::deleteSession('pedido')?>