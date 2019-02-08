<?php 
    require_once "includes/redireccion.php";
?>
<?php
    require_once "includes/cabeceras.php";
?>    

<?php
    require_once "includes/sidebar.php";
?>

<section id="contenido">
    <h1>Mis Datos</h1>
    <p>
       Modifique los datos de su cuenta
    </p>
    <form action="actions/guardar-datos-usuario.php" method="post">
        <label for="nombre-us">Nombre</label>
        <input type="text" name="nombre-us" placeholder="<?=$_SESSION['usuario']['nombre']?>">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre-us') : '';?>
        <label for="apellidos-us">Apellidos</label>
        <input type="text" name="apellidos-us" placeholder="<?=$_SESSION['usuario']['apellidos']?>">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre-us') : '';?>
        <label for="email-us">Email</label>
        <input type="email" name="email-us" placeholder="<?=$_SESSION['usuario']['email']?>">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'email-us') : '';?>
        <label for="password-us">Contraseña</label>
        <input type="password" name="password-us">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password-us') : '';?>    
        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores();?>
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>