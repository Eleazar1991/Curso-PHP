<?php
    require_once "includes/helper.php";
?>

<!-- Barra lateral -->
<section id="sidebar">
    <?php if(isset($_SESSION['usuario'])):?>
        <div id="usuario_log" class="block-aside">
            <h3><?php echo "Bienvenido! ".$_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos'];?></h3>
            <?php   if(isset($_SESSION['completado'])):?>                    
                    <?php echo "<div class='alerta alerta-exito'>".$_SESSION['completado']."</div>" ?>
            <?php   elseif(isset($_SESSION['errores']['general'])): ?>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'general'):'';?>
            <?php   endif;?>
            <a href="crear-entrada.php" class="boton">Nueva Entrada</a>
            <a href="crear-categoria.php" class="boton">Crear Categoría</a>
            <a href="modificar-datos-usuario.php" class="boton">Mis Datos</a>
            <a href="actions/logout.php" class="boton boton-rojo">Cerrar Sesión</a>
        </div>
        <?php   if(isset($_SESSION['completado'])):?>
            <?=borrarErrores();?>
        <?php   endif;?>
    <?php else:?>
        <div id="buscador" class="block-aside">
            <form action="buscar.php" method="POST">
                <h3>Buscador</h3>
                <label for="busqueda">
                    <input type="text" name="busqueda" placeholder="Inserte título de la entrada">
                    <?php echo isset($_GET['error'])? "<div class='alerta alerta-error'>".$_GET['error']."</div>":'';?>
                </label>
                <input type="submit" value="Buscar">
            </form>
        </div> 
        <div id="login" class="block-aside">
            <form action="actions/login.php" method="POST">
                <h3>Identificate</h3>
                <label for="email">
                    <p>Email
                    <input type="email" name="email"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'login-email'):'';?>
                </label>
                <label for="password">
                    <p>Contraseña
                    <input type="password" name="password"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'login-password'):'';?>
                </label>
                <input type="submit" name="submit-log" value="Enviar">
            </form>
        </div>
        <div id="register" class="block-aside">  
            <form action="actions/registro.php" method="POST">
                <!-- Motrar Errores -->
                <h3>Registrate</h3>
                <?php   if(isset($_SESSION['completado'])):?>                    
                        <?php echo "<div class='alerta alerta-exito'>".$_SESSION['completado']."</div>" ?>
                <?php   elseif(isset($_SESSION['errores']['general'])): ?>
                        <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'general'):'';?>
                <?php   endif;?>
                <label for="name">
                    <p>Nombre
                    <input type="text" name="name"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'nombre'):'';?>
                </label>
                
                <label for="surname">
                    <p>Apellidos
                    <input type="text" name="surname"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'apellidos'):'';?>
                </label>
                <label for="email">
                    <p>Email
                    <input type="email" name="email"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'email'):'';?>
                </label>
                <label for="password">
                    <p>Contraseña
                    <input type="password" name="password"></p>
                    <?php echo isset($_SESSION['errores'])?mostrarError($_SESSION['errores'],'password'):'';?>
                </label>
                    
                <input type="submit" name="submit-reg" value="Registrar">
            </form>
            <?php borrarErrores();?>
        </div>
    <?php endif;?>        
</section>