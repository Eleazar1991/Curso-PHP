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
    <h1>Crear Categorias</h1>
    <p>
        Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas
    </p>
    <form action="actions/guardar-categoria.php" method="post">
        <label for="nombre-cat">Nombre de la categoría</label>
        <input type="text" name="nombre-cat">
        <?php  echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre-cat') : '';?>
        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores();?>
</section>
<?php
    require_once "includes/footer.php";
?>
</body>
</html>