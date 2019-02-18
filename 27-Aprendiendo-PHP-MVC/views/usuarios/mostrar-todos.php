<h1>Listado de usuarios</h1>

<?php while($usuario=$todos_usuarios->fetch_object()):?>
    <?=$usuario->nombre?> - <?=$usuario->apellidos?> <br>
<?php endwhile;?>