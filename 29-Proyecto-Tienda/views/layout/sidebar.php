<!-- Barra Lateral -->
<aside id="lateral">
    <?php if(isset($_SESSION['carrito'])):?>
        <div id="carrito" class="block_aside">
            <h3>Mi carrito</h3>
            <ul>
                <li><a href="<?=base_url?>carrito/index">Ver carrito</a></li>
                <li><a href="<?=base_url?>carrito/index">Total: <?=Utils::statsCarrito()['total']?> &euro;</a></li>
                <li><a href="<?=base_url?>carrito/index">Productos (<?=Utils::statsCarrito()['count']?>)</a></li>
            </ul>
        </div>
    <?php endif;?>
    <div id="login" class="block_aside">
        <?php if(isset($_SESSION['error_login'])):?>
            <strong class="alert red"><?=$_SESSION['error_login']?></strong>
        <?php endif;?>
        <?php if(isset($_SESSION['complete_login'])):?>
            <strong class="alert green"><?=$_SESSION['complete_login']?></strong>
        <?php endif;?>
        <?php if(isset($_SESSION['complete_logout'])):?>
            <strong class="alert green"><?=$_SESSION['complete_logout']?></strong>
        <?php endif;?>
        <?php if(!isset($_SESSION['identity'])):?>
            <h3>Entrar a la Web</h3>
            <form action="<?=base_url?>usuario/login" method="post">
                <label for="email">Email: <input name="email" type="email"></label>
                <label for="password">Contraseña: <input type="password" name="password"></label>
                <input type="submit" value="Enviar">
            </form>
            <a href="<?=base_url?>usuario/registro">Registrate Aquí</a>
        <?php else:?>
            <h3>Bienvenido <?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
            <ul>
                <li><a href="<?=base_url?>pedido/mis_pedidos">Mis Pedidos</a></li>
                <?php if(isset($_SESSION['admin'])):?>
                    <li><a href="<?=base_url?>categoria/index">Gestionar categorias</a></li>
                    <li><a href="<?=base_url?>producto/gestion">Gestionar productos</a></li>
                    <li><a href="<?=base_url?>pedido/pedidos">Gestionar pedidos</a></li>                              
                <?php endif;?>  
                <li><a href="<?=base_url?>usuario/logout">Cerrar Sesion</a></li>
            </ul>  
        <?php endif;?>
    </div>
</aside>
<?php Utils::deleteSession('error_login')?>
<?php Utils::deleteSession('complete_login')?>
<?php Utils::deleteSession('complete_logout')?>
<!-- Contenido Central -->
<section id="central">