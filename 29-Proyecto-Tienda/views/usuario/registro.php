<h1>Registrate</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register']==="Completed"):?>
    <strong class="alert green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register']==="Failed"):?>
    <strong class="alert red">Registro incorrecto</strong>
<?php endif;?>
<?php   if(isset($_SESSION['completado'])):?>                    
        <?php echo "<div class='alert green'>".$_SESSION['completado']."</div>" ?>
<?php   elseif(isset($_SESSION['errores']['general'])): ?>
        <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'general'):'';?>
<?php   endif;?>
<form action="<?=base_url?>usuario/save" method="POST">
    <label for="name">Nombre: <input type="text" name="name" required></label>
    <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'nombre'):'';?>
    <label for="surname">Apellidos: <input type="text" name="surname" required></label>
    <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'apellido'):'';?>
    <label for="email">Email: <input type="email" name="email" required></label>
    <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'email'):'';?>
    <label for="password">Contraseña: <input type="password" name="password" required></label>
    <?php echo isset($_SESSION['errores'])?errorController::mostrarError($_SESSION['errores'],'password'):'';?>
    <input type="submit" value="Registrarse">
</form>
<?php Utils::deleteSession('register')?>
<?php Utils::deleteSession('errores')?>
<?php Utils::deleteSession('completado')?>